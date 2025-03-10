<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\PIRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use  App\Models\PIUserMeta;

class PIRepository implements PIRepositoryInterface
{
    public function all()
    {
        return User::with('pi')->where('type', 'pi')->get();
    }

    public function find($id)
    {
        return User::with('pi')->where('type', 'pi')->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->saveData(new User(), new PIUserMeta(), $data);
    }


    public function update($id, array $data)
    {
        // dd($id); 
        $user = $this->find($id);
        $piUserMeta = PIUserMeta::where('pi_id', $user->id)->firstOrNew(); // Fetch existing or create new
        return $this->saveData($user, $piUserMeta, $data);

    }

    public function delete($id)
    {
        $pi = $this->find($id);
        return $pi->delete();
    }

 

       /**
     * Save User & PI Metadata
     */
    private function saveData(User $user, PIUserMeta $piUserMeta, array $data)
    {
        // dd($data); 
        DB::beginTransaction();

        try {
            // Handle Profile Photo Upload
            if (isset($data['profile_photo']) && $data['profile_photo']->isValid()) {
                $user->profile_name = $this->uploadProfilePhoto($data['profile_photo'], $data['first_name']);
            }

            // Create or Update User
            $user->name = $data['first_name'];
            $user->email = $data['email'];

            if (!$user->exists) { // Only set password for new users
                $user->password = Hash::make($data['email']);
                $user->type = 'pi';
                $user->status = "inactive"; // Set status to inactive for new users
            } else {
                $user->status = $data['status'] ?? $user->status; // Update status only if provided
            }

            $user->save();

            // Create or Update PIUserMeta
            $piUserMeta->pi_id = $user->id;
            $piUserMeta->title = $data['title'] ?? null;
            $piUserMeta->address = $data['office_address'] ?? null;
            $piUserMeta->last_name = $data['last_name'] ?? null;
            $piUserMeta->department = $data['department'] ?? null;
            $piUserMeta->designation = $data['designation'] ?? null;
            $piUserMeta->alt_email = $data['alt_email'] ?? null;
            $piUserMeta->phone_number = $data['phone'] ?? null;
            $piUserMeta->mobile_number = $data['mobile'] ?? null;
            $piUserMeta->lab_number = $data['lab_room'] ?? null;
            $piUserMeta->specialization = $data['specialization'] ?? null;
            $piUserMeta->academica = $data['qualification'] ?? null;
            $piUserMeta->date_of_joining = $data['date_of_joining'] ?? null;
            $piUserMeta->status = "inactive";
            $piUserMeta->action = '1';
            $piUserMeta->login_status = "0";
            $piUserMeta->save();

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("Error saving PI Metadata: " . $e->getMessage());
        }
    }

    /**
     * Handle Profile Photo Upload
     */
    private function uploadProfilePhoto($file, $firstName)
    {
        $imageName = Str::slug($firstName) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('images/pi/images/');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $file->move($destinationPath, $imageName);

        return 'images/pi/images/' . $imageName; // Store relative path
    }
    
}


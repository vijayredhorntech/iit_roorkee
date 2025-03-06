<?php 
namespace App\Services;

use App\Models\User;
use App\Models\StudentUserMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class StudentService
{
    public function createStudent(User $user, array $data)
    {
     
         // Check if the user has permission (only superadmin or PI can create students)
        if (!in_array($user->type, ['superadmin', 'pi'])) {
            Log::error('Unauthorized user tried to create a student.', ['user_id' => $user->id]);
            return false;
        }

        DB::beginTransaction(); // Start Transaction

        try {
            // Handle Profile Photo Upload
            $profile = null;
            if (isset($data['profile_photo']) && $data['profile_photo']->isValid()) {
                $file = $data['profile_photo'];
                $imageName = Str::slug($data['first_name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('images/student/images/');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                $file->move($destinationPath, $imageName);
                $profile = 'images/student/images/' . $imageName; 
            }

            // Create User
            $newUser = new User();
            $newUser->name = $data['first_name'];
            $newUser->email = $data['email'];
            $newUser->password = Hash::make($data['email']); // Default password (can be changed later)
            $newUser->type = 'student';
            $newUser->profile_name = $profile;
            $newUser->save();

            // Create Student Metadata
            $studentMeta = new StudentUserMeta();
            $studentMeta->pi_id = $data['pi_id'] ?? null; 
            $studentMeta->sid = $newUser->id; 
            $studentMeta->student_id  = $data['student_aid'];
            $studentMeta->address = $data['address'];
            $studentMeta->lastname = $data['last_name'];
            $studentMeta->department = $data['department'];
            $studentMeta->student_year = $data['studyyear'];
            $studentMeta->altemail = $data['alt_email'];
            $studentMeta->mobile_number = $data['mobile'];
            $studentMeta->research_area = $data['research_area'];
            $studentMeta->address = $data['address'];
            $studentMeta->status = "active";
            $studentMeta->action = '1';
            $studentMeta->login_status = "0";
            $studentMeta->save();

            DB::commit(); // Commit the transaction

            return true; 
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack(); // Rollback on error
            Log::error('Error saving student metadata: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }

    
}

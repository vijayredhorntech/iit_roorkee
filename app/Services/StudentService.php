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

    public function create(array $data)
    {
        return $this->saveData(new User(), new StudentUserMeta(), $data);
    }


    // public function createStudent(User $user, array $data)
    // {
     
    //      // Check if the user has permission (only superadmin or PI can create students)
    //     if (!in_array($user->type, ['superadmin', 'pi'])) {
    //         Log::error('Unauthorized user tried to create a student.', ['user_id' => $user->id]);
    //         return false;
    //     }

    //     DB::beginTransaction(); // Start Transaction

    //     try {
    //         // Handle Profile Photo Upload
    //         $profile = null;
    //         if (isset($data['profile_photo']) && $data['profile_photo']->isValid()) {
    //             $file = $data['profile_photo'];
    //             $imageName = Str::slug($data['first_name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
    //             $destinationPath = public_path('images/student/images/');

    //             if (!File::exists($destinationPath)) {
    //                 File::makeDirectory($destinationPath, 0755, true, true);
    //             }

    //             $file->move($destinationPath, $imageName);
    //             $profile = 'images/student/images/' . $imageName; 
    //         }

    //         // Create User
    //         $newUser = new User();
    //         $newUser->name = $data['first_name'];
    //         $newUser->email = $data['email'];
    //         $newUser->password = Hash::make($data['email']); // Default password (can be changed later)
    //         $newUser->type = 'student';
    //         $newUser->profile_name = $profile;
    //         $newUser->save();

    //         // Create Student Metadata
    //         $studentMeta = new StudentUserMeta();
    //         $studentMeta->pi_id = $data['pi_id'] ?? null; 
    //         $studentMeta->sid = $newUser->id; 
    //         $studentMeta->student_id  = $data['student_aid'];
    //         $studentMeta->address = $data['address'];
    //         $studentMeta->lastname = $data['last_name'];
    //         $studentMeta->department = $data['department'];
    //         $studentMeta->student_year = $data['studyyear'];
    //         $studentMeta->altemail = $data['alt_email'];
    //         $studentMeta->mobile_number = $data['mobile'];
    //         $studentMeta->research_area = $data['research_area'];
    //         $studentMeta->address = $data['address'];
    //         $studentMeta->status = "active";
    //         $studentMeta->action = '1';
    //         $studentMeta->login_status = "0";
    //         $studentMeta->save();

    //         DB::commit(); // Commit the transaction

    //         return true; 
    //     } catch (\Exception $e) {
    //         dd($e);
    //         DB::rollBack(); // Rollback on error
    //         Log::error('Error saving student metadata: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
    //         return false;
    //     }
    // }


    /****Student update code *******/
    // public function updateStudent(User $user, array $data){

    //       // Check if the user has permission (only superadmin or PI can create students)
    //       if (!in_array($user->type, ['superadmin', 'pi'])) {
    //         Log::error('Unauthorized user tried to create a student.', ['user_id' => $user->id]);
    //         return false;
    //     }

    //     DB::beginTransaction(); // Start Transaction

    //     try {
    //         // Handle Profile Photo Upload
    //         $profile = null;
    //         if (isset($data['profile_photo']) && $data['profile_photo']->isValid()) {
    //             $file = $data['profile_photo'];
    //             $imageName = Str::slug($data['first_name']) . '_' . time() . '.' . $file->getClientOriginalExtension();
    //             $destinationPath = public_path('images/student/images/');

    //             if (!File::exists($destinationPath)) {
    //                 File::makeDirectory($destinationPath, 0755, true, true);
    //             }

    //             $file->move($destinationPath, $imageName);
    //             $profile = 'images/student/images/' . $imageName; 
    //         }

    //         // Create User
    //         $newUser = new User();
    //         $newUser->name = $data['first_name'];
    //         $newUser->email = $data['email'];
    //         $newUser->password = Hash::make($data['email']); // Default password (can be changed later)
    //         $newUser->type = 'student';
    //         $newUser->profile_name = $profile;
    //         $newUser->save();

    //         // Create Student Metadata
    //         $studentMeta = new StudentUserMeta();
    //         $studentMeta->pi_id = $data['pi_id'] ?? null; 
    //         $studentMeta->sid = $newUser->id; 
    //         $studentMeta->student_id  = $data['student_aid'];
    //         $studentMeta->address = $data['address'];
    //         $studentMeta->lastname = $data['last_name'];
    //         $studentMeta->department = $data['department'];
    //         $studentMeta->student_year = $data['studyyear'];
    //         $studentMeta->altemail = $data['alt_email'];
    //         $studentMeta->mobile_number = $data['mobile'];
    //         $studentMeta->research_area = $data['research_area'];
    //         $studentMeta->address = $data['address'];
    //         $studentMeta->status = "active";
    //         $studentMeta->action = '1';
    //         $studentMeta->login_status = "0";
    //         $studentMeta->save();

    //         DB::commit(); // Commit the transaction

    //         return true; 
    //     } catch (\Exception $e) {
    //         dd($e);
    //         DB::rollBack(); // Rollback on error
    //         Log::error('Error saving student metadata: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
    //         return false;
    //     }

    // }

    public function createStudent(User $user, array $data){
        $data = $this->saveData(new User(), new StudentUserMeta() , $data) ;
        return $data; 

    }


    public function updateStudent(User $user, array $data){
 
        $user = User::find($data['student_id']);
  
        $studentUserMeta = StudentUserMeta::where('sid', $data['student_id'])->firstOrNew(); // Fetch existing or create new
        $data = $this->saveData($user, $studentUserMeta , $data) ;
        return $data;
    }


    /**
     * Save Student & Metadata
     */
    private function saveData(User $user , StudentUserMeta $studentMeta, array $data)
    {
        DB::beginTransaction();

    // dd($data); 
        try {
            // Handle Profile Photo Upload
            if (isset($data['profile_photo']) && $data['profile_photo']->isValid()) {
                $user->profile_name = $this->uploadProfilePhoto($data['profile_photo'], $data['first_name']);
            
            }

            // Create or Update User
            $user->name = $data['first_name'];
            $user->email = $data['email'];

            // if (!$user->exists) {
            //     $user->password = Hash::make($data['email']);
            //     $user->type = 'student';
            // }
            if (!$user->exists) { // Only set password for new users
                $user->password = Hash::make($data['email']);
                $user->type = 'student';
                $user->status = "inactive"; // Set status to inactive for new users
            } else {
                $user->status = $data['status'] ?? $user->status; // Update status only if provided
            }

            $user->save();

          
            // Create or Update Student Meta
            $studentMeta->sid = $user->id;
       
                $studentMeta->pi_id = $data['pi_id'] ?? null;
            
           
            $studentMeta->student_id = $data['student_aid'];
            $studentMeta->lastname = $data['last_name'];
            $studentMeta->department = $data['department'];
            $studentMeta->student_year = $data['studyyear'];
            $studentMeta->altemail = $data['alt_email'];
            $studentMeta->mobile_number = $data['mobile'];
            $studentMeta->research_area = $data['research_area'];
            $studentMeta->address = $data['address'];
            $studentMeta->status = "inactive";
            $studentMeta->action = '1';
            $studentMeta->login_status = "0";

            $studentMeta->save();

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            dd($e); 
            DB::rollBack();
            throw new \Exception("Error saving Student Metadata: " . $e->getMessage());
        }
    }




    /**
     * Handle Profile Photo Upload
     */
    private function uploadProfilePhoto($file, $firstName)
    {
        $imageName = Str::slug($firstName) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('images/student/images/');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        $file->move($destinationPath, $imageName);

        return 'images/student/images/' . $imageName; 
    }
    
}

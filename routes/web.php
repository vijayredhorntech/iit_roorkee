<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Superadmin\PIController;
use App\Http\Controllers\PI\AccessPIController;
use App\Http\Controllers\Superadmin\StudentController;
use App\Http\Controllers\Student\AccessStudentController;
use App\Http\Controllers\Superadmin\LabController;
use App\Http\Controllers\Superadmin\InstrumentsController;
use App\Http\Controllers\PI\BookingController;





Route::get('/impersonate/{id}', function ($id) {
    $user = User::findOrFail($id);
    Auth::login($user);
   
})->name('userlogin');



// Route::get('/', function () { return view('login');});
/*******Auth login route*******/

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'showLoginForm')->middleware(AuthMiddleware::class)->name('login');
    Route::post('/login', 'auth_login')->name('auth.login');
    Route::get('/logout', 'auth_logout')->name('logout');
    Route::get('/impersonate/{id}', 'direct_login')->name('userlogin');
});



Route::prefix('super-admin')->middleware(AdminMiddleware::class)->group(function () {


     /******Super admin PI  route ********/

    Route::controller(PIController::class)->group(function () {
        Route::get('/pi', 'hs_picreste')->name('pi_create');
        Route::post('/pistore', 'hs_pistore')->name('pi_store');
        Route::get('/view_pi','hs_viewallpi')->name('alldetails_pi');
        Route::get('/view_pi/{id}','hs_viewpi')->name('view_pi.details');
    });


     /******Super admin Student route ********/

    Route::controller(StudentController::class)->group(function () {
        Route::get('/create_student', 'hs_createstudent')->name('superadmin.create_student');
        Route::post('/studentstore', 'hs_studentstore')->name('student_store');
        Route::get('/view_student', 'hs_viewallstudent')->name('alldetails_student');
        Route::get('/view_student/{id}','hs_viewstudent')->name('view_student.details');
        
    });


     /******Super admin Lab   route ********/

     Route::controller(LabController::class)->group(function () {

        Route::get('/create_lab','hs_labcreate')->name('superadmin.create_lab');
        Route::get('/lab_list', 'hs_lablist')->name('superadmin.lab_list');
        Route::post('/lab_store', 'hs_labstore')->name('superadmin.lab_store');
    });



    /******Super admin InstrumentsController  route ********/
    Route::controller(InstrumentsController::class)->group(function () {
        Route::get('/create_instrument', 'hs_create_instrumentcategory')->name('superadmin.create_instrumentcategory');
        Route::post('/store_categories','hs_store_categories')->name('superadmin.storeinstrumentcategory');
        Route::get('/instrument_category_list','hs_instrument_categorieslist')->name('superadmin.categorylist');
        Route::get('/instruments-list', 'hs_instrumentlist')->name('superadmin.instrument_list');
        Route::get('/create_Instrument','hs_create_Instrument')->name('superadmin.create_Instrument');
        Route::post('/create_Instrument','hs_Instrumentstore')->name('superadmin.instrument_store');
        Route::get('/view_instrument/{id}','hs_view_instrument')->name('superadmin.view_instrument');
        Route::get('/add_acceossries/{id}', 'hs_add_accessories')->name('superadmin.add_accessories');
        Route::post('/accessories','hs_accessoriesstore')->name('superadmin.accessory_store');
        Route::get('/view_acceossries/{id}', 'hs_view_acceossries')->name('superadmin.view_acceossries');

    });
    

});





/******All Pi Route  ********/

Route::prefix('pi')->group(function () {
    Route::controller(AccessPIController::class)->group(function () {
        Route::get('/pidashboard','hs_pidashboard')->name('pidashboard');
        Route::get('/studentview','hs_studentlist')->name('allpi_student');
        Route::get('/view_student/{id}','hs_viewstudent')->name('piview_student.details');
        Route::get('/create_student', 'hs_createstudent')->name('pi.create_student');
        
    });

    Route::controller(StudentController::class)->group(function () {
        Route::post('/studentstore', 'hs_studentstore')->name('agency.studentstore');
    });


    /*****Booking Managment system********/

    Route::controller(BookingController::class)->group(function () {
        Route::get('/booking', 'hs_bookingindex')->name('pi.booking');
        Route::post('/getinstrument', 'hs_getinstrument')->name('pi.getinstrument'); 
        Route::post('/storebooking','hs_storebooking')->name('pi.storebooking');
        Route::post('/booking/store', 'store')->name('pi.booking.store');
        Route::get('/booking/{id}', 'show')->name('pi.booking.show');
        Route::put('/booking/{id}', 'update')->name('pi.booking.update');
        Route::delete('/booking/{id}', 'destroy')->name('pi.booking.destroy');
    });


   


  
});

Route::controller(BookingController::class)->group(function () {
    Route::get('/test', 'show');}); 

/******All Student  Route  ********/

Route::prefix('student')->group(function () {
    Route::controller(AccessStudentController::class)->group(function () {
        Route::get('/studentdashboard','hs_studentdashboard')->name('studentdashboard');
    });
});








/***** Remove bellow  route after completed ********/

// Route::get('/pidashboard', function () { return view('pi.dashboard');})->name('pidashboard');

/****Route student*******/
// Route::get('/studentdashboard', function () { return view('student.dashboard');})->name('studentdashboard');

Route::get('/forget_password', function () { return view('forgetPassword');})->name('forget_password');
Route::get('/password_link_sent', function () { return view('passwordLinkSent');})->name('password_link_sent');


Route::get('/dashboard', function () { return view('superadmin.dashboard');})->middleware(AdminMiddleware::class)->name('dashboard');


Route::prefix('instrument')->group(function () {
    Route::get('/create_instrument', function () { return view('createInstrument');})->name('create_instrument');
    Route::get('/view_instrument', function () { return view('viewInstrument');})->name('view_instrument');
    Route::get('/instruments-list', function () { return view('instrumentsList');})->name('instrument_list');
    Route::get('/add_acceossries', function () { return view('addAcceossries');})->name('add_acceossries');
    Route::get('/view_acceossries', function () { return view('viewAcceossries');})->name('view_acceossries');
    
});


Route::prefix('pi')->group(function () {
    Route::get('/create_pi', function () { return view('createPi');})->name('create_pi');
    Route::get('/pi_list', function () { return view('piList');})->name('pi_list');
    Route::get('/view_pi', function () { return view('viewPi');})->name('view_pi');
});

Route::prefix('student')->group(function () {
    Route::get('/create_student', function () { return view('createStudent');})->name('create_student');
    Route::get('/student_list', function () { return view('studentList');})->name('student_list');
    Route::get('/view_student_dashboard', function () { return view('viewStudentDashboard');})->name('view_student_dashboard');
});

Route::prefix('lab')->group(function () {
    Route::get('/create_lab', function () { return view('createLab');})->name('create_lab');
    Route::get('/lab_list', function () { return view('labList');})->name('lab_list');
});

Route::prefix('instrument_category')->group(function () {
    Route::get('/create_instrument_category', function () { return view('createInstrumentCategory');})->name('create_instrument_category');
    Route::get('/instrument_category_list', function () { return view('instrumentCategoryList');})->name('instrument_category_list');
});


Route::prefix('booking')->group(function () {
    Route::get('/book_instrument', function () { return view('bookInstrument');})->name('book_instrument');
});


Route::get('/roles', function () { return view('roles');})->name('roles');
Route::get('/permissions', function () { return view('permissions');})->name('permissions');
// Access Control Routes
Route::prefix('access-control')->group(function () {
    Route::get('/roles', function () { return view('roles');})->name('roles');
    Route::get('/permissions', function () { return view('permissions');})->name('permissions');
});

// Service Management Routes
Route::prefix('service')->group(function () {
    Route::get('/maintenance_schedule', function () { return view('maintenanceSchedule');})->name('maintenance_schedule');
    Route::get('/service_records', function () { return view('serviceRecords');})->name('service_records');
});

// Training Routes
Route::prefix('training')->group(function () {
    Route::get('/modules', function () { return view('trainingModules');})->name('training_modules');
    Route::get('/certifications', function () { return view('certifications');})->name('certifications');
});

// Booking Management Routes
Route::prefix('booking')->group(function () {
    Route::get('/calendar', function () { return view('bookingCalendar');})->name('booking_calendar');
    Route::get('/requests', function () { return view('bookingRequest');})->name('booking_requests');
});


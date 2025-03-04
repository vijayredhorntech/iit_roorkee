<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Superadmin\PIController;



// Route::get('/', function () { return view('login');});
/*******Auth login route*******/

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'showLoginForm')->middleware(AuthMiddleware::class)->name('login');
    Route::post('/login', 'auth_login')->name('auth.login');
    Route::get('/logout', 'auth_logout')->name('logout');
});



Route::prefix('super-admin')->group(function () {

    Route::controller(PIController::class)->group(function () {
        Route::get('/pi', 'hs_picreste')->name('pi_create');
        Route::post('/pistore', 'hs_pistore')->name('pi_store');
        Route::get('/view_pi','hs_viewallpi')->name('alldetails_pi');
        Route::get('/view_pi/{id}','hs_viewpi')->name('view_pi.details');

    });
});






/****Route pi*******/
Route::get('/pidashboard', function () { return view('pi.dashboard');})->name('pidashboard');

/****Route student*******/
Route::get('/studentdashboard', function () { return view('student.dashboard');})->name('studentdashboard');

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


<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('login');});
Route::get('/forget_password', function () { return view('forgetPassword');})->name('forget_password');
Route::get('/password_link_sent', function () { return view('passwordLinkSent');})->name('password_link_sent');


Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');


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


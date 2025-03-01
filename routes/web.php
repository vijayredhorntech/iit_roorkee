<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('login');});
Route::get('/forget_password', function () { return view('forgetPassword');})->name('forget_password');
Route::get('/password_link_sent', function () { return view('passwordLinkSent');})->name('password_link_sent');


Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');


Route::get('/create_instrument', function () { return view('createInstrument');})->name('create_instrument');
Route::get('/view_instrument', function () { return view('viewInstrument');})->name('view_instrument');
Route::get('/instruments-list', function () { return view('instrumentsList');})->name('instruments_list');
Route::get('/add_acceossriest', function () { return view('addAcceossries');})->name('add_acceossries');
Route::get('/view_acceossries', function () { return view('viewAcceossries');})->name('view_acceossries');


Route::get('/create_pi', function () { return view('createPi');})->name('create_pi');
Route::get('/pi_list', function () { return view('piList');})->name('pi_list');
Route::get('/view_pi', function () { return view('viewPi');})->name('view_pi');

Route::get('/create_student', function () { return view('createStudent');})->name('create_student');
Route::get('/student_list', function () { return view('studentList');})->name('student_list');
Route::get('/view_student', function () { return view('viewstudent');})->name('view_student');

Route::get('/create_lab', function () { return view('createLab');})->name('create_lab');
Route::get('/lab_list', function () { return view('labList');})->name('lab_list');

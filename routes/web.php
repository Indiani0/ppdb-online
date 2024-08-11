<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/beranda', [App\Http\Controllers\DashboardController::class, 'index'])->name('beranda');
Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form');
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/classification', [App\Http\Controllers\ClassificationController::class, 'index'])->name('classification');

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::get('/students/pdf', [App\Http\Controllers\StudentController::class, 'generatePDF'])->name('students.pdf');

Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::post('/student', [App\Http\Controllers\FormController::class, 'store'])->name('students.store');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('students', App\Http\Controllers\StudentController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);

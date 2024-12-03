<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\GradeController as AdminGradeController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact',
        'nama' => 'Your Name',
        'alamat' => 'Your Address',
        'linkedin_link' => 'https://linkedin.com/in/yourprofile',
        'repository_link' => 'https://github.com/yourusername'
    ]);
})->name('contact');

// Student routes untuk user biasa
Route::get('/students', [StudentController::class, 'index'])->name('students');

// Grade routes
Route::get('/grades', [GradeController::class, 'index'])->name('grades');
Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');

// Department routes
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Admin resource routes dengan namespace yang benar
        Route::resource('students', AdminStudentController::class);
        Route::resource('grades', AdminGradeController::class);
        Route::resource('departments', AdminDepartmentController::class);
    });
});









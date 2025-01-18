<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login.submit');

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])
    ->middleware("admin")
    ->name('dashboard');

    Route::get('/dashboard/employee', [App\Http\Controllers\employeeController::class, 'index'])
    ->middleware('admin')
    ->name('employee');


    Route::get('/dashboard/add-employee', [App\Http\Controllers\employeeController::class, 'add'])
    ->middleware('admin')
    ->name('employee');

    Route::post('/dashboard/add-employee', [App\Http\Controllers\employeeController::class, 'store'])
    ->middleware('admin')
    ->name('employee');


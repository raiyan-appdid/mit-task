<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\AuthController;


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
        ->name('view-employee');

        Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');

        Route::delete('/employees/{id}', [employeeController::class, 'destroy'])->name('employee.destroy');

        Route::get('/dashboard/project', [App\Http\Controllers\projectController::class, 'index'])->middleware('admin')->name('project');

        Route::get('/dashboard/add-project', [projectController::class, 'add'])
        ->middleware('admin')
        ->name('view-project');

        Route::post('/dashboard/add-project', [projectController::class, 'store'])
        ->middleware('admin')
        ->name('project.store');

        Route::get('/dashboard/projects/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/dashboard/projects/{id}', [ProjectController::class, 'update'])->name('project.update');

        Route::delete('/dashboard/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

        //apis






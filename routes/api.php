<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/employee-login', 'employeeLogin');
        Route::post('/employee-logout', 'employeeLogout');

        Route::post('/project-list', 'projectList');

    });
});

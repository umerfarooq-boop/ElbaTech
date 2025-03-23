<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddlewaree;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;

Route::get('/',[AuthController::class,'Home'])->name('home');
Route::get('/login',[AuthController::class,'Login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/loginuser', [AuthController::class, 'loginuser'])->name('loginuser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/table', [CompanyController::class, 'index'])
    ->middleware('role:admin')
    ->name('table'); 

Route::middleware(['role:admin'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees',EmployeeController::class);
});

Route::get('/employee_index', [EmployeeController::class, 'EmployeeData'])
    ->middleware('role:employee')
    ->name('employee_index'); 

Route::get('/edit_employee/{id}', [EmployeeController::class, 'EditEmployee'])
    ->middleware('role:employee')
    ->name('edit_employee'); 

Route::post('/reset_information/{id}', [EmployeeController::class, 'ResetInformation'])
    ->middleware('role:employee')
    ->name('reset_information'); 

    Route::get('/lang', [LanguageController::class, 'change'])->name("change.lang");






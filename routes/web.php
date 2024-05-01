<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\AuthController;

use App\Models\Company;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    if(Auth()->user()){
        return view('layouts.layout');

    }
    else{
        return view('auth.login');
    }
  
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



route::get('/dashboard', 'App\Http\Controllers\AuthController@auth_user')->name('dashboard');



Route::middleware([
    'admin'
])->group(function () {
    Route::group(['prefix' => 'companies'], function () {
        //Admin Add Company
        Route::post('/add_company', [CompanyController::class, 'add_company'])->name('add_company');
        Route::get('/add_company',[CompanyController::class, 'add_company_page'] )->name('add_company_page');
    
        //Admin Company Page
        Route::get('/company', [CompanyController::class, 'company_page'])->name('company_page');
    
        //Admin Edit and Update
        Route::get('companies/{id}/edit', [CompanyController::class, 'editCompany'])->name('companies_edit');
        Route::put('companies/{id}', [CompanyController::class,'update'])->name('companies.update');
        
        //Admin  Delete company
        Route::post('company_delete/{id}', [CompanyController::class,'deleteCompany'])->name('company.delete');
       
    });
    
    
       
  
});

Route::middleware(['Admin_company'])->group(function () {
    Route::post('/create_employee', [employeeController::class, 'create_employee'])->name('create_employee');
    Route::get('/create_employee', [employeeController::class, 'create_employee_page'])->name('create_employee_page');

    // Employee Page
    Route::get('/employee', [employeeController::class, 'employee_page'])->name('employee_page');

    // Edit and Update
    Route::get('/{id}/edit', [employeeController::class, 'edit'])->name('employee_edit');
    Route::put('/update/{id}', [employeeController::class, 'update'])->name('employee_update');

    // Delete Employee
    Route::post('/delete/{id}', [employeeController::class, 'delete'])->name('employee_delete');

    // Appointment
    Route::get('/employee_Appointments/{id}', [employeeController::class, 'employee_Appointments'])->name('employee_Appointments');
    route::post('/Admin/create_appointments/{id}',[ employeeController::class,'add_appointment'])->name('admin_create_appointments');
    // route::post('/delete_appointments/{id}' , [employeeController::class, 'delete_appointments'])->name('delete.appointments');
    Route::post('/delete-appointment/{id}', [employeeController::class, 'delete_appointment'])->name('delete.appointment');

});


// Route::middleware([
//     'company'
// ])->group(function () {
   
// });
//Appointment Route
route::post('/create_appointments',[ AuthController::class,'add_appointment'])->name('add');
Route::post('/update-data', [ employeeController::class,'edit_appointment'])->name('update.data');
Route::post('/delete-appointment/{id}', [AuthController::class, 'delete_appointment'])->name('delete.appointment');

});

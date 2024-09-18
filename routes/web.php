<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\http\Controllers\EmployeeController;
use App\http\Controllers\DepartmentController;
use App\http\Controllers\DepartmentEmployeesController;
use App\http\Controllers\TaskController;
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::resource('Employee', EmployeeController::class);
Route::resource('Department', DepartmentController::class);
Route::resource('Task', TaskController::class);
Route::resource('DepartmentEmployees', DepartmentEmployeesController::class);

Route::get('displaydatatable',[EmployeeController::class,'displaydt'])->name('Employee.display');

Route::get('displaydatatableDepartment',[DepartmentController::class,'displaydt'])->name('Department.display');

Route::get('displaydatatableTask',[TaskController::class,'displaydt'])->name('Task.display');

Route::get('/{page}',[AdminController::class , 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

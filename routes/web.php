<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [EmployeeController::class, 'index'])->name('index');
Route::get('/list', [EmployeeController::class, 'getEmployees'])->name('employees.list');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('delete');

Route::post('/employees', [EmployeeController::class, 'store'])->name('store');

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::patch('/employees/{employee}', [EmployeeController::class, 'update'])->name('update');
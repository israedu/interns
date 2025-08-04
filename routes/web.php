<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});
Route::get('/add-employee', function () {
    return view('add-employee');
})->name('add-employee'); 

Route::post('/store-employee', [EmployeeController::class, 'store'])->name('store-employee'); 

Route::post( '/delete-employee', [EmployeeController::class, 'destroy'])->name('delete-employee');
Route::post('/update-employee', [EmployeeController::class, 'update'])->name('update-employee');
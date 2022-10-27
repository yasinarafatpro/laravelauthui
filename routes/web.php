<?php

use App\Http\Controllers\Admin\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit/money', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit.money')->middleware('verified');

//designation routes
Route::get('empldesignation',[\App\Http\Controllers\Admin\DesignationController::class,'index'])->name('designation.index');
Route::get('create/designation',[\App\Http\Controllers\Admin\DesignationController::class,'create'])->name('designation.create');
Route::post('store/designation',[\App\Http\Controllers\Admin\DesignationController::class,'store'])->name('designation.store');
Route::get('delete/designation/{id}',[\App\Http\Controllers\Admin\DesignationController::class,'delete'])->name('designation.delete');
Route::get('edit/designation/{id}',[\App\Http\Controllers\Admin\DesignationController::class,'edit'])->name('designation.edit');
Route::post('update/designation/{id}',[\App\Http\Controllers\Admin\DesignationController::class,'updatedeg'])->name('designation.update');

//employee routes
Route::resource('employees',EmployeeController::class);
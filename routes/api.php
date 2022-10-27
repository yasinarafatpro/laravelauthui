<?php

use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//designation routes
Route::get('/designation',[DesignationController::class,'index'])->name('designation.index');
Route::post('/create/designation',[DesignationController::class,'store'])->name('designation.store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\User\UserController;
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


Route::post('login',[UserController::class,'login']);
Route::post('register',[UserController::class,'register']);

Route::group(['prefix' => 'auth','middleware' => 'jwt'], function (){

    Route::post('logout',[UserController::class,'logout']);
    Route::get('get-profile',[UserController::class,'getProfile']);
    Route::post('update-profile',[UserController::class,'updateProfile'])->middleware('check-guard');

});


Route::group(['prefix' => 'employee','middleware' => ['jwt','check-guard']], function (){

    Route::get('get-all-employees',[EmployeeController::class,'getAllEmployees']);
    Route::post('create',[EmployeeController::class,'create']);
    Route::get('get-profile/{id}',[EmployeeController::class,'getProfile']);
    Route::post('update/{id}',[EmployeeController::class,'update']);
    Route::delete('delete/{id}',[EmployeeController::class,'delete']);
    Route::put('active/{id}',[EmployeeController::class,'active']);

});

<?php

use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\State\StateController;
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

Route::group(['prefix' => 'auth','middleware' => ['jwt','check-guard:user-api']], function (){

    Route::post('logout',[UserController::class,'logout']);
    Route::get('get-profile',[UserController::class,'getProfile']);
    Route::post('update-profile',[UserController::class,'updateProfile']);
});


Route::group(['prefix' => 'employee','middleware' => 'jwt'], function (){

    Route::get('get-all-employees',[EmployeeController::class,'getAllEmployees']);
    Route::post('create',[EmployeeController::class,'create']);
    Route::get('show-data/{id}',[EmployeeController::class,'getProfile']);
    Route::post('update/{id}',[EmployeeController::class,'update']);
    Route::delete('delete/{id}',[EmployeeController::class,'delete']);
    Route::put('active/{id}',[EmployeeController::class,'active']);

    Route::post('logout',[EmployeeController::class,'logout'])->middleware('check-guard:employee-api');
    Route::get('get-profile',[EmployeeController::class,'getProfileEmployee'])->middleware('check-guard:employee-api');
});



Route::group(['prefix' => 'state','middleware' => ['jwt']], function (){

    Route::get('all-states',[StateController::class,'getAllStates']);
    Route::post('create',[StateController::class,'create']);
    Route::get('show/{id}',[StateController::class,'show']);
    Route::post('update/{id}',[StateController::class,'update']);
    Route::post('change-status/{id}',[StateController::class,'changeStatus']);
    Route::delete('delete/{id}',[StateController::class,'delete']);
});

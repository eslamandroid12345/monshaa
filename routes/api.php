<?php

use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Expense\ExpenseController;
use App\Http\Controllers\Api\Land\LandController;
use App\Http\Controllers\Api\State\StateController;
use App\Http\Controllers\Api\Tenant\TenantController;
use App\Http\Controllers\Api\TenantContract\TenantContractController;
use App\Http\Controllers\Api\User\UserController;
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

Route::group(['prefix' => 'auth','middleware' => ['jwt']], function (){

    Route::post('logout',[UserController::class,'logout']);
    Route::get('get-profile',[UserController::class,'getProfile']);
    Route::post('update-profile',[UserController::class,'updateProfile'])->middleware('check-user');
});


Route::group(['prefix' => 'employee','middleware' => ['jwt','permission:employees']], function (){

    Route::get('get-all-employees',[EmployeeController::class,'getAllEmployees']);
    Route::post('create',[EmployeeController::class,'create']);
    Route::get('show-data/{id}',[EmployeeController::class,'show']);
    Route::post('update/{id}',[EmployeeController::class,'update']);
    Route::delete('delete/{id}',[EmployeeController::class,'delete']);
    Route::put('active/{id}',[EmployeeController::class,'active']);
});



Route::group(['prefix' => 'state','middleware' => ['jwt','permission:states']], function (){

    Route::get('all-states',[StateController::class,'getAllStates']);
    Route::post('create',[StateController::class,'create']);
    Route::get('show/{id}',[StateController::class,'show']);
    Route::post('update/{id}',[StateController::class,'update']);
    Route::post('change-status/{id}',[StateController::class,'changeStatus']);
    Route::delete('delete/{id}',[StateController::class,'delete']);
});


Route::group(['prefix' => 'land','middleware' => ['jwt','permission:lands']], function (){

    Route::get('all-lands',[LandController::class,'getAllLands']);
    Route::post('create',[LandController::class,'create']);
    Route::get('show/{id}',[LandController::class,'show']);
    Route::post('update/{id}',[LandController::class,'update']);
    Route::post('change-status/{id}',[LandController::class,'changeStatus']);
    Route::delete('delete/{id}',[LandController::class,'delete']);
});


Route::group(['prefix' => 'tenant','middleware' => ['jwt','permission:tenants']], function (){

    Route::get('all-tenants',[TenantController::class,'getAllTenants']);
    Route::post('create',[TenantController::class,'create']);
    Route::get('show/{id}',[TenantController::class,'show']);
    Route::post('update/{id}',[TenantController::class,'update']);
    Route::delete('delete/{id}',[TenantController::class,'delete']);
});


Route::group(['prefix' => 'tenant-contract','middleware' => ['jwt','permission:tenant_contracts']], function (){

    Route::get('all-tenant-contracts',[TenantContractController::class,'allTenantContracts']);
    Route::post('create',[TenantContractController::class,'create']);
    Route::get('show/{id}',[TenantContractController::class,'show']);
    Route::post('update/{id}',[TenantContractController::class,'update']);
    Route::delete('delete/{id}',[TenantContractController::class,'delete']);
});



Route::group(['prefix' => 'expenses','middleware' => ['jwt','permission:expenses']], function (){

    Route::get('all-expenses',[ExpenseController::class,'getAllExpenses']);
    Route::post('create',[ExpenseController::class,'create']);
    Route::get('show/{id}',[ExpenseController::class,'show']);
    Route::post('update/{id}',[ExpenseController::class,'update']);
    Route::delete('delete/{id}',[ExpenseController::class,'delete']);
});



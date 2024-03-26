<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\TechnicalSupport\TechnicalSupportController;
use App\Models\Company;
use App\Models\TenantContract;
use Carbon\Carbon;
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


Route::get('/',[AuthController::class,'loginView'])->name('login')->middleware('guest:admin');
Route::post('/loginProcess',[AuthController::class,'login'])->name('loginProcess');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function (){

    Route::get('companies',[CompanyController::class,'getAllCompanies'])->name('admin.companies');
    Route::delete('companies/destroy/{id}',[CompanyController::class,'destroy'])->name('admin.companies.destroy');
    Route::get('companies/edit/{id}',[CompanyController::class,'edit'])->name('admin.companies.edit');
    Route::put('companies/update/{id}',[CompanyController::class,'update'])->name('admin.companies.update');
    Route::get('technical_support',[TechnicalSupportController::class,'getAllMessages'])->name('admin.technical_support');

});





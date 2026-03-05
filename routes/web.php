<?php

use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\TechnicalSupport\TechnicalSupportController;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Land\LandController;
use App\Http\Controllers\Api\Report\ReportController;
use App\Http\Controllers\Api\State\StateController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Dashboard\AuthController as AdminAuthController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\HomeController;
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


//Route::get('/', function (){
//  return  Carbon::now()->addDays(2)->format('Y-m-d');
//});

//Route::get('/',[AuthController::class,'loginView'])->name('login')->middleware('guest:admin');
//Route::post('/loginProcess',[AuthController::class,'login'])->name('loginProcess');
//Route::get('/logout',[AuthController::class,'logout'])->name('logout');
//
//Route::get('/',[AuthController::class,'loginView'])->name('login')->middleware('guest:admin');
//
//
//Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function (){
//
//    Route::get('companies',[CompanyController::class,'getAllCompanies'])->name('admin.companies');
//    Route::delete('companies/destroy/{id}',[CompanyController::class,'destroy'])->name('admin.companies.destroy');
//    Route::get('companies/edit/{id}',[CompanyController::class,'edit'])->name('admin.companies.edit');
//    Route::put('companies/update/{id}',[CompanyController::class,'update'])->name('admin.companies.update');
//    Route::get('technical_support',[TechnicalSupportController::class,'getAllMessages'])->name('admin.technical_support');
    //last update
//});



Route::get('/',[HomeController::class,'index'])->name('welcome');
Route::get('/login',[AuthController::class,'loginView'])->name('login.view');
Route::get('/register',[AuthController::class,'registerView'])->name('register.view');
Route::get('/password-reset',[AuthController::class,'passwordReset'])->name('password.reset');
Route::get('/terms_and_condition',[HomeController::class,'terms'])->name('terms.condition.view');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/login',[AdminAuthController::class,'loginView'])->name('admin.login.view');
    Route::get('/register',[AdminAuthController::class,'registerView'])->name('admin.register.view');
    Route::post('/login',[UserController::class,'login'])->name('admin.login');
    Route::post('/register',[UserController::class,'register'])->name('admin.register');
    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout')->middleware('auth');
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin.dashboard')->middleware('auth');
    Route::get('/states',[StateController::class,'getAllStates'])->name('states.index');
    Route::post('state/create',[StateController::class,'create'])->name('admin.state.create');
    Route::post('state/update/{id}',[StateController::class,'update'])->name('admin.state.update');
    Route::get('states/edit/{id}',[StateController::class,'edit'])->name('admin.states.edit');
    Route::delete('state/destroy/{id}',[StateController::class,'delete'])->name('admin.state.destroy');
    Route::get('state/show/{id}',[StateController::class,'showView'])->name('admin.state.show');
    Route::get('get-all-clients',[ClientController::class,'getAllClients'])->name('clients.index');
    Route::post('client/create',[ClientController::class,'create'])->name('clients.create');
    Route::get('client/show/{id}',[ClientController::class,'show'])->name('clients.show');
    Route::post('client/update/{id}',[ClientController::class,'update'])->name('clients.update');
    Route::delete('client/delete/{id}',[ClientController::class,'delete'])->name('clients.delete');
    Route::get('client/edit/{id}',[ClientController::class,'edit'])->name('admin.clients.edit');
    Route::get('reports',[ReportController::class,'index'])->name('admin.reports.index');
    Route::get('report/states',[ReportController::class,'states'])->name('admin.reports.states');
    Route::get('report/lands',[ReportController::class,'lands'])->name('admin.reports.lands');
    Route::get('tenant-contracts',[ReportController::class,'tenantContracts'])->name('admin.reports.contracts');

    //Lands
    Route::get('all-lands',[LandController::class,'getAllLands'])->name('lands.index');
    Route::post('land/create',[LandController::class,'create'])->name('lands.create');
    Route::get('land/show/{id}',[LandController::class,'show'])->name('lands.show');
    Route::get('land/edit/{id}',[LandController::class,'edit'])->name('lands.edit');
    Route::post('land/update/{id}',[LandController::class,'update'])->name('lands.update');
    Route::post('land/change-status/{id}',[LandController::class,'changeStatus'])->name('lands.changeStatus');
    Route::delete('land/delete/{id}',[LandController::class,'delete'])->name('lands.delete');
});



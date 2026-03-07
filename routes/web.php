<?php

use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\TechnicalSupport\TechnicalSupportController;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Expense\ExpenseController;
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

Route::group(['prefix' => 'admin'], function (){
    //Auth
    Route::get('/login',[AdminAuthController::class,'loginView'])->name('admin.login.view');
    Route::get('/register',[AdminAuthController::class,'registerView'])->name('admin.register.view');
    Route::post('/login',[UserController::class,'login'])->name('admin.login');
    Route::post('/register',[UserController::class,'register'])->name('admin.register');
    Route::get('/logout',[UserController::class,'logout'])->name('admin.logout')->middleware('auth');
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->name('admin.dashboard')->middleware('auth');

    //States
    Route::group(['middleware' => ['permission:states']], function (){
    Route::get('/states',[StateController::class,'getAllStates'])->name('states.index');
    Route::post('state/create',[StateController::class,'create'])->name('admin.state.create');
    Route::post('state/update/{id}',[StateController::class,'update'])->name('admin.state.update');
    Route::get('states/edit/{id}',[StateController::class,'edit'])->name('admin.states.edit');
    Route::delete('state/destroy/{id}',[StateController::class,'delete'])->name('admin.state.destroy');
    Route::get('state/show/{id}',[StateController::class,'showView'])->name('admin.state.show');
    });

    //Clients
    Route::group(['middleware' => ['permission:clients']], function (){
    Route::get('get-all-clients',[ClientController::class,'getAllClients'])->name('clients.index');
    Route::post('client/create',[ClientController::class,'create'])->name('clients.create');
    Route::get('client/show/{id}',[ClientController::class,'show'])->name('clients.show');
    Route::post('client/update/{id}',[ClientController::class,'update'])->name('clients.update');
    Route::delete('client/delete/{id}',[ClientController::class,'delete'])->name('clients.delete');
    Route::get('client/edit/{id}',[ClientController::class,'edit'])->name('admin.clients.edit');
    });

    //Reports
    Route::get('reports',[ReportController::class,'index'])->name('admin.reports.index');
    Route::get('report/states',[ReportController::class,'states'])->name('admin.reports.states');
    Route::get('report/lands',[ReportController::class,'lands'])->name('admin.reports.lands');
    Route::get('tenant-contracts',[ReportController::class,'tenantContracts'])->name('admin.reports.contracts');
    Route::get('report/revenues',[ReportController::class,'revenues'])->name('admin.reports.revenues');
    Route::get('report/expenses',[ReportController::class,'expenses'])->name('admin.reports.expenses');
    Route::get('report/profits',[ReportController::class,'profits'])->name('admin.reports.profits');

    //Lands
    Route::group(['middleware' => ['permission:lands']], function (){
    Route::get('all-lands',[LandController::class,'getAllLands'])->name('lands.index');
    Route::post('land/create',[LandController::class,'create'])->name('lands.create');
    Route::get('land/show/{id}',[LandController::class,'show'])->name('lands.show');
    Route::get('land/edit/{id}',[LandController::class,'edit'])->name('lands.edit');
    Route::post('land/update/{id}',[LandController::class,'update'])->name('lands.update');
    Route::post('land/change-status/{id}',[LandController::class,'changeStatus'])->name('lands.changeStatus');
    Route::delete('land/delete/{id}',[LandController::class,'delete'])->name('lands.delete');
    });


    //Employees
    Route::group(['middleware' => ['permission:employees']], function (){

    Route::get('get-all-employees',[EmployeeController::class,'getAllEmployees'])->name('admin.employees.index');
    Route::post('employee/create',[EmployeeController::class,'create'])->name('admin.employees.create');
    Route::get('employee/edit/{id}',[EmployeeController::class,'edit'])->name('admin.employees.edit');
    Route::get('employee/show-data/{id}',[EmployeeController::class,'show'])->name('admin.employees.show');
    Route::post('employee/update/{id}',[EmployeeController::class,'update'])->name('admin.employees.update');
    Route::delete('employee/delete/{id}',[EmployeeController::class,'delete'])->name('admin.employees.delete');
    Route::put('employee/active/{id}',[EmployeeController::class,'active'])->name('admin.employees.active');
    });


    Route::get('all-expenses',[ExpenseController::class,'getAllExpenses'])
        ->middleware('permission:expenses')
        ->name('admin.expenses.index');

    Route::get('all-revenues',[ExpenseController::class,'getAllRevenues'])
        ->middleware('permission:revenue')
        ->name('admin.revenues.index');

    Route::post('expense/revenue/create',[ExpenseController::class,'create'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.expenses.revenue.create');

    Route::get('expense/revenue/show/{id}',[ExpenseController::class,'show'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.expenses.revenue.show');

    Route::get('expense/edit/{id}',[ExpenseController::class,'editExpense'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.expenses.edit');

    Route::get('revenue/edit/{id}',[ExpenseController::class,'editRevenue'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.revenues.edit');

    Route::post('expense/revenue/update/{id}',[ExpenseController::class,'update'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.expenses.revenue.update');

    Route::delete('expense/revenue/delete/{id}',[ExpenseController::class,'delete'])
        ->middleware('permission:expenses|revenue')
        ->name('admin.expenses.revenue.delete');

});



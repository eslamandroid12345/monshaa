<?php

use App\Http\Controllers\Api\Cash\CashController;
use App\Http\Controllers\Api\Client\ClientController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Employee\EmployeeController;
use App\Http\Controllers\Api\Expense\ExpenseController;
use App\Http\Controllers\Api\Land\LandController;
use App\Http\Controllers\Api\Notification\NotificationController;
use App\Http\Controllers\Api\Receipt\ReceiptController;
use App\Http\Controllers\Api\Report\ReportController;
use App\Http\Controllers\Api\State\StateController;
use App\Http\Controllers\Api\TechnicalSupport\TechnicalSupportController;
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
    Route::post('update-profile',[UserController::class,'updateProfile'])->middleware('check-user');//hh
});


Route::group(['prefix' => 'employee','middleware' => ['jwt','permission:employees']], function (){

    Route::get('get-all-employees',[EmployeeController::class,'getAllEmployees']);
    Route::post('create',[EmployeeController::class,'create']);
    Route::get('show-data/{id}',[EmployeeController::class,'show']);
    Route::post('update/{id}',[EmployeeController::class,'update']);
    Route::post('delete/{id}',[EmployeeController::class,'delete']);
    Route::put('active/{id}',[EmployeeController::class,'active']);
});

Route::group(['middleware' => ['jwt','permission:home_page']], function (){

    Route::get('home',[UserController::class,'home']);

});


Route::group(['prefix' => 'state','middleware' => ['jwt','permission:states']], function (){

    Route::get('all-states',[StateController::class,'getAllStates']);
    Route::post('create',[StateController::class,'create']);
    Route::get('show/{id}',[StateController::class,'show']);
    Route::post('update/{id}',[StateController::class,'update']);
    Route::post('change-status/{id}',[StateController::class,'changeStatus']);
    Route::post('delete/{id}',[StateController::class,'delete']);
});


Route::group(['prefix' => 'land','middleware' => ['jwt','permission:lands']], function (){

    Route::get('all-lands',[LandController::class,'getAllLands']);
    Route::post('create',[LandController::class,'create']);
    Route::get('show/{id}',[LandController::class,'show']);
    Route::post('update/{id}',[LandController::class,'update']);
    Route::post('change-status/{id}',[LandController::class,'changeStatus']);
    Route::post('delete/{id}',[LandController::class,'delete']);
});


Route::group(['prefix' => 'tenant','middleware' => ['jwt','permission:tenants']], function (){

    Route::get('all-tenants',[TenantController::class,'getAllTenants']);
    Route::post('create',[TenantController::class,'create']);
    Route::get('show/{id}',[TenantController::class,'show']);
    Route::post('update/{id}',[TenantController::class,'update']);
    Route::post('delete/{id}',[TenantController::class,'delete']);
});


Route::group(['prefix' => 'tenant-contract','middleware' => ['jwt','permission:tenant_contracts']], function (){

    Route::get('all-tenant-contracts',[TenantContractController::class,'allTenantContracts']);
    Route::post('create',[TenantContractController::class,'create']);
    Route::get('show/{id}',[TenantContractController::class,'show']);
    Route::post('update/{id}',[TenantContractController::class,'update']);
    Route::post('delete/{id}',[TenantContractController::class,'delete']);
});


Route::group(['prefix' => 'tenant-contracts-expired','middleware' => ['jwt','permission:expired_contracts']], function (){
    Route::get('all',[TenantContractController::class,'tenantContractsExpired']);
    Route::post('remove-from-screen/{id}',[TenantContractController::class,'removeFromScreen']);

});


Route::group(['prefix' => 'reports','middleware' => ['jwt','permission:reports']], function (){

    Route::get('states',[ReportController::class,'states']);
    Route::get('lands',[ReportController::class,'lands']);
    Route::get('tenant-contracts',[ReportController::class,'tenantContracts']);
    Route::get('revenues',[ReportController::class,'revenues']);
    Route::get('expenses',[ReportController::class,'expenses']);
    Route::get('profits',[ReportController::class,'profits']);

});

Route::group(['prefix' => 'technical_support','middleware' => ['jwt','permission:technical_support']], function (){

    Route::post('create',[TechnicalSupportController::class,'create']);//add
});

Route::group(['prefix' => 'expenses','middleware' => ['jwt','permission:expenses']], function (){

    Route::get('all-expenses',[ExpenseController::class,'getAllExpenses']);
    Route::get('all-revenues',[ExpenseController::class,'getAllRevenues']);
    Route::post('create',[ExpenseController::class,'create']);
    Route::get('show/{id}',[ExpenseController::class,'show']);
    Route::post('update/{id}',[ExpenseController::class,'update']);
    Route::post('delete/{id}',[ExpenseController::class,'delete']);
});


Route::group(['prefix' => 'receipt','middleware' => ['jwt','permission:financial_receipt']], function (){

    Route::get('get-all-receipts',[ReceiptController::class,'getAllReceipts']);
    Route::post('create/{id}',[ReceiptController::class,'create']);
    Route::get('show/{id}',[ReceiptController::class,'show']);
    Route::post('update/{id}',[ReceiptController::class,'update']);
    Route::post('delete/{id}',[ReceiptController::class,'delete']);
});



Route::group(['prefix' => 'cash','middleware' => ['jwt','permission:financial_cash']], function (){

    Route::get('get-all-cashes',[CashController::class,'getAllCashes']);
    Route::post('create/{id}',[CashController::class,'create']);
    Route::get('show/{id}',[CashController::class,'show']);
    Route::post('update/{id}',[CashController::class,'update']);
    Route::post('delete/{id}',[CashController::class,'delete']);
});


Route::group(['prefix' => 'clients','middleware' => ['jwt','permission:clients']], function (){

    Route::get('get-all-clients',[ClientController::class,'getAllClients']);
    Route::get('get-all-employees',[ClientController::class,'getAllEmployees']);
    Route::post('create',[ClientController::class,'create']);
    Route::get('show/{id}',[ClientController::class,'show']);
    Route::post('update/{id}',[ClientController::class,'update']);
    Route::post('delete/{id}',[ClientController::class,'delete']);
});

Route::group(['prefix' => 'companies','middleware' => ['jwt','permission:companies','is_administrator']], function (){

    Route::get('get-all',[CompanyController::class,'getAllCompanies']);
    Route::get('show/{id}',[CompanyController::class,'show']);
    Route::post('update/{id}',[CompanyController::class,'update']);
    Route::post('delete/{id}',[CompanyController::class,'delete']);
    Route::get('get-all-messages',[TechnicalSupportController::class,'getAllMessages']);

});


Route::group(['prefix' => 'notifications','middleware' => ['jwt','permission:notifications']], function (){

    Route::get('all',[NotificationController::class,'all']);

});


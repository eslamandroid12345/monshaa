<?php

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

Route::get('/', function () {

//    return TenantContract::query()
//        ->where('company_id','=',21)
//        ->whereDate('contract_date_to','=',Carbon::now()->subDays(3)->format('Y-m-d'))
//        ->count();


//    return TenantContract::query()
//        ->where('company_id','=',21)
//        ->whereDate('contract_date_to','=',Carbon::now()->addDays(3)->format('Y-m-d'))
//        ->get();

    return Company::query()->pluck('id')->toArray();
//    return \App\Models\User::query()->pluck('id')->toArray();

//    return view('welcome');
});


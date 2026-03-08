<?php

namespace App\Providers;

use App\Http\Services\Client\ClientMobileService;
use App\Http\Services\Client\ClientService;
use App\Http\Services\Client\ClientWebService;
use App\Http\Services\Employee\EmployeeMobileService;
use App\Http\Services\Employee\EmployeeService;
use App\Http\Services\Employee\EmployeeWebService;
use App\Http\Services\EmployeeCommission\EmployeeCommissionMobileService;
use App\Http\Services\EmployeeCommission\EmployeeCommissionService;
use App\Http\Services\EmployeeCommission\EmployeeCommissionWebService;
use App\Http\Services\Expense\ExpenseMobileService;
use App\Http\Services\Expense\ExpenseService;
use App\Http\Services\Expense\ExpenseWebService;
use App\Http\Services\Land\LandMobileService;
use App\Http\Services\Land\LandService;
use App\Http\Services\Land\LandWebService;
use App\Http\Services\Report\ReportMobileService;
use App\Http\Services\Report\ReportService;
use App\Http\Services\Report\ReportWebService;
use App\Http\Services\State\StateMobileService;
use App\Http\Services\State\StateService;
use App\Http\Services\State\StateWebService;
use App\Http\Services\TenantContract\TenantContractMobileService;
use App\Http\Services\TenantContract\TenantContractService;
use App\Http\Services\TenantContract\TenantContractWebService;
use App\Http\Services\User\UserMobileService;
use App\Http\Services\User\UserService;
use App\Http\Services\User\UserWebService;
use Illuminate\Support\ServiceProvider;

class PlatformServiceProvider extends ServiceProvider
{
    public function detectPlatform($webService, $mobileService)
    {
        if (request()->is('api/*'))
            return $mobileService;
        return $webService;
    }
    public function register()
    {
        $this->app->singleton(UserService::class,$this->detectPlatform(UserWebService::class,UserMobileService::class));
        $this->app->singleton(StateService::class,$this->detectPlatform(StateWebService::class,StateMobileService::class));
        $this->app->singleton(ClientService::class,$this->detectPlatform(ClientWebService::class,ClientMobileService::class));
        $this->app->singleton(ReportService::class,$this->detectPlatform(ReportWebService::class,ReportMobileService::class));
        $this->app->singleton(LandService::class,$this->detectPlatform(LandWebService::class,LandMobileService::class));
        $this->app->singleton(EmployeeService::class,$this->detectPlatform(EmployeeWebService::class,EmployeeMobileService::class));
        $this->app->singleton(ExpenseService::class,$this->detectPlatform(ExpenseWebService::class,ExpenseMobileService::class));
        $this->app->singleton(TenantContractService::class,$this->detectPlatform(TenantContractWebService::class,TenantContractMobileService::class));
        $this->app->singleton(EmployeeCommissionService::class,$this->detectPlatform(EmployeeCommissionWebService::class,EmployeeCommissionMobileService::class));
    }


}

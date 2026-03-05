<?php

namespace App\Providers;

use App\Http\Services\Client\ClientMobileService;
use App\Http\Services\Client\ClientService;
use App\Http\Services\Client\ClientWebService;
use App\Http\Services\Land\LandMobileService;
use App\Http\Services\Land\LandService;
use App\Http\Services\Land\LandWebService;
use App\Http\Services\Report\ReportMobileService;
use App\Http\Services\Report\ReportService;
use App\Http\Services\Report\ReportWebService;
use App\Http\Services\State\StateMobileService;
use App\Http\Services\State\StateService;
use App\Http\Services\State\StateWebService;
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
    }


}

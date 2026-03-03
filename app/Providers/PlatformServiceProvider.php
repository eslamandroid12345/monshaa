<?php

namespace App\Providers;

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
    }


}

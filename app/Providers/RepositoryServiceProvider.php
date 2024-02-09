<?php

namespace App\Providers;

use App\Repository\CompanyRepositoryInterface;
use App\Repository\Eloquent\CompanyRepository;
use App\Repository\Eloquent\EmployeeRepository;
use App\Repository\Eloquent\LandRepository;
use App\Repository\Eloquent\Repository;
use App\Repository\Eloquent\StateRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\EmployeeRepositoryInterface;
use App\Repository\LandRepositoryInterface;
use App\Repository\RepositoryInterface;
use App\Repository\StateRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(LandRepositoryInterface::class, LandRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}

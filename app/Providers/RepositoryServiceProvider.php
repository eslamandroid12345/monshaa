<?php

namespace App\Providers;

use App\Repository\CashRepositoryInterface;
use App\Repository\ClientRepositoryInterface;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\Eloquent\CashRepository;
use App\Repository\Eloquent\ClientRepository;
use App\Repository\Eloquent\CompanyRepository;
use App\Repository\Eloquent\EmployeeCommissionRepository;
use App\Repository\Eloquent\EmployeeRepository;
use App\Repository\Eloquent\ExpenseRepository;
use App\Repository\Eloquent\FcmTokenRepository;
use App\Repository\Eloquent\LandImageRepository;
use App\Repository\Eloquent\LandRepository;
use App\Repository\Eloquent\NotificationRepository;
use App\Repository\Eloquent\ReceiptRepository;
use App\Repository\Eloquent\Repository;
use App\Repository\Eloquent\StateImageRepository;
use App\Repository\Eloquent\StateRepository;
use App\Repository\Eloquent\TechnicalSupportRepository;
use App\Repository\Eloquent\TenantContractRepository;
use App\Repository\Eloquent\TenantRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\EmployeeCommissionRepositoryInterface;
use App\Repository\EmployeeRepositoryInterface;
use App\Repository\ExpenseRepositoryInterface;
use App\Repository\FcmTokenRepositoryInterface;
use App\Repository\LandImageRepositoryInterface;
use App\Repository\LandRepositoryInterface;
use App\Repository\NotificationRepositoryInterface;
use App\Repository\ReceiptRepositoryInterface;
use App\Repository\RepositoryInterface;
use App\Repository\StateImageRepositoryInterface;
use App\Repository\StateRepositoryInterface;
use App\Repository\TechnicalSupportRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use App\Repository\TenantRepositoryInterface;
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
        $this->app->singleton(RepositoryInterface::class, Repository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->singleton(StateRepositoryInterface::class, StateRepository::class);
        $this->app->singleton(LandRepositoryInterface::class, LandRepository::class);
        $this->app->singleton(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->singleton(TenantRepositoryInterface::class, TenantRepository::class);
        $this->app->singleton(TenantContractRepositoryInterface::class, TenantContractRepository::class);
        $this->app->singleton(ExpenseRepositoryInterface::class, ExpenseRepository::class);
        $this->app->singleton(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->singleton(CashRepositoryInterface::class, CashRepository::class);
        $this->app->singleton(FcmTokenRepositoryInterface::class, FcmTokenRepository::class);
        $this->app->singleton(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->singleton(StateImageRepositoryInterface::class, StateImageRepository::class);
        $this->app->singleton(LandImageRepositoryInterface::class, LandImageRepository::class);
        $this->app->singleton(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->singleton(TechnicalSupportRepositoryInterface::class, TechnicalSupportRepository::class);
        $this->app->singleton(EmployeeCommissionRepositoryInterface::class, EmployeeCommissionRepository::class);

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

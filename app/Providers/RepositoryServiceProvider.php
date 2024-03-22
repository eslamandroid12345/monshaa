<?php

namespace App\Providers;

use App\Repository\CashRepositoryInterface;
use App\Repository\ClientRepositoryInterface;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\Eloquent\CashRepository;
use App\Repository\Eloquent\ClientRepository;
use App\Repository\Eloquent\CompanyRepository;
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
use App\Repository\Eloquent\TenantContractRepository;
use App\Repository\Eloquent\TenantRepository;
use App\Repository\Eloquent\UserRepository;
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
        $this->app->bind(RepositoryInterface::class, Repository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(LandRepositoryInterface::class, LandRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
        $this->app->bind(TenantContractRepositoryInterface::class, TenantContractRepository::class);
        $this->app->bind(ExpenseRepositoryInterface::class, ExpenseRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(CashRepositoryInterface::class, CashRepository::class);
        $this->app->bind(FcmTokenRepositoryInterface::class, FcmTokenRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(StateImageRepositoryInterface::class, StateImageRepository::class);
        $this->app->bind(LandImageRepositoryInterface::class, LandImageRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);

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

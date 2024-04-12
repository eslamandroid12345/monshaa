<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;//Auth

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('check-company-auth', function ($user,$model) {
            return $user->company_id == $model->company_id
                ? Response::allow()
                : Response::deny('ليس لديك صلاحيه علي هذا');
        });


        Gate::define('check-user-auth', function ($user,$model) {
            return $user->id == $model->user_id || $user->is_admin == 1
                ? Response::allow()
                : Response::deny('ليس لديك صلاحيه علي هذا');
        });


    }
}

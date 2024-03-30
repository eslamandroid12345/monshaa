<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function logo() : Attribute {
        return Attribute::get(
            get: function ($value) {
                if ($value !== null) {
                    return url($value);
                }
                return url('logo/logo.PNG');
            }
        );
    }


    public function states(): HasMany
    {
        return $this->hasMany(State::class,'company_id','id');
    }


    public function statesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->states()->count();
            }
        );
    }

    public function lands(): HasMany
    {
        return $this->hasMany(Land::class,'company_id','id');
    }


    public function landsCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->lands()->count();
            }
        );
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class,'company_id','id');
    }


    public function tenantsCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->tenants()->count();
            }
        );
    }

    public function tenantContracts(): HasMany
    {
        return $this->hasMany(TenantContract::class,'company_id','id');
    }

    public function tenantContractsCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->tenantContracts()->count();
            }
        );
    }

    public function cashes(): HasMany
    {
        return $this->hasMany(Cash::class,'company_id','id');
    }


    public function cashesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->cashes()->count();
            }
        );
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class,'company_id','id');
    }


    public function receiptsCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->receipts()->count();
            }
        );
    }


    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class,'company_id','id')->where('type','=','expense');
    }

    public function expensesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->expenses()->sum('total_money');
            }
        );
    }

    public function employees(): HasMany
    {
        return $this->hasMany(User::class,'company_id','id');
    }


    public function employeesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->employees()->count();
            }
        );
    }


    ############ Sum total revenue of company ##############################

    public function revenues(): HasMany
    {
        return $this->hasMany(Expense::class,'company_id','id')->where('type','=','revenue');
    }



    public function revenuesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->revenues()?->sum('total_money');
            }
        );
    }


    public function profitsCount() : Attribute {
        return Attribute::get(
            get: function () {

                $totalRevenues = $this->revenues()?->sum('total_money');
                $totalExpenses =  $this->expenses()?->sum('total_money');
                return $totalRevenues > $totalExpenses ? ($totalRevenues - $totalExpenses) : 0;
            }
        );
    }
    ############ Sum total revenue of company ##############################


    public function tenantStates(): HasMany
    {
        return $this->hasMany(State::class,'company_id','id')->where('department','=','rent');
    }

    public function tenantStatesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->tenantStates()->count();
            }
        );
    }

    public function sellingStates(): HasMany
    {
        return $this->hasMany(State::class,'company_id','id')->where('department','=','sale');
    }


    public function sellingStatesCount() : Attribute {
        return Attribute::get(
            get: function () {

                return $this->sellingStates()->count();
            }
        );
    }


    public function clients(): HasMany
    {
        return $this->hasMany(Client::class,'company_id','id');
    }


    public function clientsCount() : Attribute {
        return Attribute::get(
            get: function () {
                return $this->clients()->count();
            }
        );
    }

    public function dateEnd() : Attribute {
        return Attribute::get(
            get: function () {
                return Carbon::parse($this->date_start_subscription)->addYear();

            }
        );
    }


    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class,'company_id','id');
    }



    public function notificationsCount() : Attribute {
        return Attribute::get(
            get: function () {
                return $this->notifications()->whereHas('notificationViews' , function ($q){
                    $q->where('user_id','=',employeeId())->where('is_view',0);
                })->count();
            }
        );
    }

}

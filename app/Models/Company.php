<?php

namespace App\Models;

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
                return null;
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



    public function revenues(): HasMany
    {
        return $this->hasMany(Expense::class,'company_id','id')->where('type','=','revenue');
    }



    ############ Sum total revenue of company ##############################
    public function revenuesCount() : Attribute {
        return Attribute::get(
            get: function () {
                return $this->revenues()->sum('total_money');
            }
        );
    }
    ############ Sum total revenue of company ##############################


    public function tenantStates(): HasMany
    {
        return $this->hasMany(State::class,'company_id','id')->where('department','=','rent');
    }


    public function sellingStates(): HasMany
    {
        return $this->hasMany(State::class,'company_id','id')->where('department','=','sale');
    }


}

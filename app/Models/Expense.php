<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function company(): BelongsTo
    {

        return $this->belongsTo(Company::class,'company_id','id');
    }


    public function totalRevenue(): Attribute
    {
        return Attribute::get(function (){

            return Expense::query()
                ->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null && request('date_to') != null, function ($q) {
                    $q->whereBetween('transaction_date',[request('date_from'), request('date_to')]);
                })

                ->where('company_id','=',companyId())
                ->where('type','=','revenue')
                ->sum('total_money');

        });
    }


    public function totalExpense(): Attribute
    {
        return Attribute::get(function (){

            return Expense::query()
                ->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null && request('date_to') != null, function ($q) {
                    $q->whereBetween('transaction_date',[request('date_from'), request('date_to')]);
                })

                ->where('company_id','=',companyId())
                ->where('type','=','expense')
                ->sum('total_money');

        });
    }

}

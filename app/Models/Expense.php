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
            $query = Expense::query();

                 $query->when(request()->filled('date_from'), function ($q) {
                     $q->where('transaction_date', '>=', request()->input('date_from'));
                 });

                $query->when(request()->filled('date_to'), function ($q) {
                    $q->where('transaction_date', '<=', request()->input('date_to'));
                });

                return $query
                ->where('company_id','=',companyId())
                ->where('type','=','revenue')
                ->sum('total_money');
        });
    }


    public function totalExpense(): Attribute
    {
        return Attribute::get(function (){
            $query = Expense::query();

            $query->when(request()->filled('date_from'), function ($q) {
                $q->where('transaction_date', '>=', request()->input('date_from'));
            });

            $query->when(request()->filled('date_to'), function ($q) {
                $q->where('transaction_date', '<=', request()->input('date_to'));
            });
            return $query
                ->where('company_id','=',companyId())
                ->where('type','=','expense')
                ->sum('total_money');
        });
    }

}

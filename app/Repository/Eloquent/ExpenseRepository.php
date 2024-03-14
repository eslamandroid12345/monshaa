<?php

namespace App\Repository\Eloquent;

use App\Models\Expense;
use App\Repository\ExpenseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ExpenseRepository  extends Repository implements ExpenseRepositoryInterface
{

    protected Model $model;

    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }


    public function getAllExpenses(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('date_from') && request('date_from') != null && request()->has('date_to') && request('date_to') != null, function ($q)  {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);

        });

        return $query
            ->latest()
            ->where('type','=','expense')
            ->select(['*'])
            ->with(['company','user'])
            ->where('company_id','=',auth('user-api')->user()->company_id)
            ->paginate(16);

    }


    public function getAllRevenues(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('date_from') && request('date_from') != null && request()->has('date_to') && request('date_to') != null, function ($q)  {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);

        });

        return $query
            ->latest()
            ->where('type','=','revenue')
            ->select(['*'])
            ->with(['company','user'])
            ->where('company_id','=',auth('user-api')->user()->company_id)
            ->paginate(16);

    }

}

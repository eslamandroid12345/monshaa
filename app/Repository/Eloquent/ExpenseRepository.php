<?php

namespace App\Repository\Eloquent;

use App\Http\Resources\ProfitResource;
use App\Http\Traits\Responser;
use App\Models\Expense;
use App\Repository\ExpenseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ExpenseRepository  extends Repository implements ExpenseRepositoryInterface
{

    use Responser;

    protected Model $model;

    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }


    public function getAllExpenses(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('transaction_date', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('transaction_date', '<=', request()->input('date_to'));
        });

        return $query
            ->latest()
            ->where('type','=','expense')
            ->select(['*'])
            ->with(['company','user'])
            ->where('company_id','=',companyId())
            ->paginate(50);

    }


    public function getAllRevenues(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('transaction_date', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('transaction_date', '<=', request()->input('date_to'));
        });


        return $query
            ->latest()
            ->where('type','=','revenue')
            ->select(['*'])
            ->with(['company','user'])
            ->where('company_id','=',companyId())
            ->paginate(50);

    }

    public function getCurrentRevenuesTotal()
    {
        return $this->model::query()->first()->total_revenue ?? 0;
    }


    public function getCurrentExpensesTotal()
    {
        return $this->model::query()->first()->total_expense ?? 0;
    }


    public function revenuesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('transaction_date', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('transaction_date', '<=', request()->input('date_to'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('type','=','revenue')
            ->paginate(50);

    }

    public function expensesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('transaction_date', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('transaction_date', '<=', request()->input('date_to'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('type','=','expense')
            ->paginate(50);

    }


    public function profits()
    {
        $month = request('month') ?? Carbon::now()->month;
        $year  = request('year') ?? Carbon::now()->year;

        $totalRevenues = $this->model::query()
            ->whereMonth('transaction_date', $month)
            ->whereYear('transaction_date', $year)
            ->where('company_id', companyId())
            ->where('type', 'revenue')
            ->sum('total_money');

        $totalExpenses = $this->model::query()
            ->whereMonth('transaction_date', $month)
            ->whereYear('transaction_date', $year)
            ->where('company_id', companyId())
            ->where('type', 'expense')
            ->sum('total_money');

        $response = [
            'total_revenue' => $totalRevenues,
            'total_expense' => $totalExpenses,
            'total_profits' => max($totalRevenues - $totalExpenses, 0),
            'date' => $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT),
        ];

        if(request()->is('api/*')){
            return $this->responseSuccess(
                data: new ProfitResource($response),
                code: 200,
                message: 'تم الحصول علي بيانات ارباح وايرادات ومصروفات الشركه'
            );
        }

        return $response;
    }



}

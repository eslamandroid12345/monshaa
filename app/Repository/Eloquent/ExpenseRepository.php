<?php

namespace App\Repository\Eloquent;

use App\Http\Resources\ProfitResource;
use App\Http\Traits\Responser;
use App\Models\Expense;
use App\Repository\ExpenseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

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

        $query->when(request()->has('date_from') && request('date_from') != null && request()->has('date_to') && request('date_to') != null, function ($q)  {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);

        });

        return $query
            ->latest()
            ->where('type','=','expense')
            ->select(['*'])
            ->with(['company','user'])
            ->where('company_id','=',companyId())
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
            ->where('company_id','=',companyId())
            ->paginate(16);

    }



    public function revenuesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);
        });


        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('type','=','revenue')
            ->paginate(16);


    }



    public function expensesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);
        });


        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('type','=','expense')
            ->paginate(16);

    }


    public function profits(): JsonResponse
    {


        $totalRevenues = $this->model::query()
            ->when(request()->has('month') && request()->has('year') && request('month') != null && request('year') != null, function ($q) {
        $q->whereMonth('transaction_date','=', request()->input('month'))
            ->whereYear('transaction_date','=', request()->input('year'));
             })

            ->when(request('month') == null && request('year') == null, function ($q) {
                $q->whereMonth('transaction_date','=', Carbon::now()->format('m'))
                    ->whereYear('transaction_date','=', Carbon::now()->format('Y'));
            })
            ->where('company_id','=',companyId())
            ->where('type','=','revenue')
            ->sum('total_money');

        $totalExpenses = $this->model::query()
            ->when(request()->has('month') && request()->has('year') && request('month') != null && request('year') != null, function ($q) {
                $q->whereMonth('transaction_date','=', request()->input('month'))
                    ->whereYear('transaction_date','=', request()->input('year'));
            })
            ->when(request('month') == null && request('year') == null, function ($q) {
                $q->whereMonth('transaction_date','=', Carbon::now()->format('m'))
                    ->whereYear('transaction_date','=', Carbon::now()->format('Y'));
            })
            ->where('company_id','=',companyId())
            ->where('type','=','expense')
            ->sum('total_money');

        $date = request('month') == null && request('year') == null ?
            Carbon::now()->format('Y-m') :
            Carbon::now()->format(request('year').'-'. request('month'));

        $response['total_revenue'] = $totalRevenues;
        $response['total_expense'] = $totalExpenses;
        $response['total_profits'] = ($totalRevenues - $totalExpenses);
        $response['date'] = $date;


        return $this->responseSuccess(data: new ProfitResource($response), code: 200, message: 'تم الحصول علي بيانات ارباح وايردات ومصروفات الشركه');

    }



}

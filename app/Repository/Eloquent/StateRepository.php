<?php

namespace App\Repository\Eloquent;

use App\Models\State;
use App\Repository\StateRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class StateRepository extends Repository implements StateRepositoryInterface
{

    protected Model $model;

    public function __construct(State $model)
    {
        parent::__construct($model);
    }

    public function getAllStatusQuery(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('real_state_address') && request('real_state_address') != null, function ($q)  {
            $q->where('real_state_address', 'like', '%' . request()->input('real_state_address') . '%');
        });

        $query->when(request()->has('department') && request('department') != null, function ($q)  {
            $q->where('department', '=',  request()->input('department'));
        });

        $query->when(request()->has('real_state_type') && request('real_state_type') != null, function ($q)  {
            $q->where('real_state_type', '=', request()->input('real_state_type'));
        });

        $query->when(request()->has('lowest_price') && request()->has('highest_price') && request('lowest_price') != null && request('highest_price') != null, function ($q) {
            $q->whereBetween('real_state_price', [request()->input('lowest_price'), request()->input('highest_price')]);
        });

        $query->when(request()->has('lowest_space') && request()->has('highest_space') && request('lowest_space') != null&& request('highest_space') != null, function ($q) {
            $q->whereBetween('real_state_space', [request()->input('lowest_space'), request()->input('highest_space')]);
        });

        $query->when(request()->has('advertiser_type') && request('advertiser_type') != null, function ($q)  {
            $q->where('advertiser_type', '=',  request()->input('advertiser_type'));
        });

        $query->when(request()->has('code') && request()->input('code') != null, function ($q)  {
            $q->where('id', '=',  request()->input('code'));
        });

        $query->when(request()->has('compound_name') && request()->input('compound_name') != null, function ($q)  {
            $q->where('compound_name', 'like', '%' . request()->input('compound_name') . '%');
        });

        $query->when(request()->has('user_id') && request()->input('user_id') != null, function ($q)  {
            $q->where('user_id', '=',  request()->input('user_id'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('status','=','waiting')
            ->paginate(16);


    }


    public function statesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
            $q->whereBetween('state_date_register', [request()->input('date_from'), request()->input('date_to')]);
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('status','=','waiting')
            ->paginate(16);


    }


}

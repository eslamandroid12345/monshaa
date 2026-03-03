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

    public function getAllStatusQuery()
    {
        $query = $this->model::query();

        $query->when(request()->filled('real_state_address'), function ($q)  {
            $q->where('real_state_address', 'like', '%' . request()->input('real_state_address') . '%');
        });

        $query->when(request()->filled('department'), function ($q)  {
            $q->where('department', '=',  request()->input('department'));
        });

        $query->when(request()->filled('real_state_type'), function ($q)  {
            $q->where('real_state_type', '=', request()->input('real_state_type'));
        });

        $query->when(request()->filled('lowest_price') && request()->filled('highest_price') , function ($q) {
            $q->whereBetween('real_state_price', [request()->input('lowest_price'), request()->input('highest_price')]);
        });

        $query->when(request()->filled('lowest_space') && request()->filled('highest_space'), function ($q) {
            $q->whereBetween('real_state_space', [request()->input('lowest_space'), request()->input('highest_space')]);
        });

        $query->when(request()->filled('advertiser_type'), function ($q)  {
            $q->where('advertiser_type', '=',  request()->input('advertiser_type'));
        });

        $query->when(request()->filled('code'), function ($q)  {
            $q->where('id', '=',  request()->input('code'));
        });

        $query->when(request()->filled('compound_name'), function ($q)  {
            $q->where('compound_name', 'like', '%' . request()->input('compound_name') . '%');
        });

        $query->when(request()->filled('user_id'), function ($q)  {
            $q->where('user_id', '=',  request()->input('user_id'));
        });

        return $query
            ->orderByDesc('id')
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('status','=','waiting')
            ->paginate(50);


    }


    public function statesReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->filled('date_from') && request()->filled('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
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

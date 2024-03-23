<?php

namespace App\Repository\Eloquent;
use App\Models\Land;
use App\Repository\LandRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class LandRepository extends Repository implements LandRepositoryInterface
{

    protected Model $model;

    public function __construct(Land $model)
    {
        parent::__construct($model);
    }

    public function getAllLandsQuery(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('address') && request('address') != null, function ($q)  {
            $q->where('address', 'like', '%' . request()->input('address') . '%');
        });


        $query->when(request()->has('lowest_price') && request()->has('highest_price') && request('lowest_price') != null && request('highest_price') != null, function ($q) {
            $q->whereBetween('price_of_one_meter', [request()->input('lowest_price'), request()->input('highest_price')]);
        });


        $query->when(request()->has('lowest_space') && request()->has('highest_space') && request('lowest_space') != null&& request('highest_space') != null, function ($q) {
            $q->whereBetween('size_in_metres', [request()->input('lowest_space'), request()->input('highest_space')]);
        });

        $query->when(request()->has('advertiser_type') && request('advertiser_type') != null, function ($q)  {
            $q->where('advertiser_type', '=',  request()->input('advertiser_type'));
        });

        $query->when(request()->has('code') && request()->input('code') != null, function ($q)  {
            $q->where('id', '=',  request()->input('code'));
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


    public function landsReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
            $q->whereBetween('land_date_register', [request()->input('date_from'), request()->input('date_to')]);
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

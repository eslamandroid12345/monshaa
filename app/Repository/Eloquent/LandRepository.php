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

        $query->when(request()->filled('lowest_price'), function ($q) {
            $q->where('price_of_one_meter', '>=', request()->input('lowest_price'));
        });


        $query->when(request()->filled('highest_price'), function ($q) {
            $q->where('price_of_one_meter', '<=', request()->input('highest_price'));
        });

        $query->when(request()->filled('lowest_space'), function ($q) {
            $q->where('size_in_metres', '>=', request()->input('lowest_space'));
        });


        $query->when(request()->filled('highest_space'), function ($q) {
            $q->where('size_in_metres', '<=', request()->input('highest_space'));
        });


        $query->when(request()->filled('advertiser_type'), function ($q)  {
            $q->where('advertiser_type', '=',  request()->input('advertiser_type'));
        });

        $query->when(request()->filled('code'), function ($q)  {
            $q->where('id', '=',  request()->input('code'));
        });

        $query->when(request()->filled('user_id'), function ($q)  {
            $q->where('user_id', '=',  request()->input('user_id'));
        });

        $query->when(request()->filled('status'), function ($q)  {
            $q->where('status', '=',  request()->input('status'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->paginate(50);


    }


    public function landsReports(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('land_date_register', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('land_date_register', '<=', request()->input('date_to'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('status','=','waiting')
            ->paginate(50);


    }


}

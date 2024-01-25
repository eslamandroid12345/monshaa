<?php

namespace App\Repository\Eloquent;
use App\Http\Services\Mutual\AuthService;
use App\Models\Land;
use App\Repository\LandRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class LandRepository extends Repository implements LandRepositoryInterface
{

    protected Model $model;

    protected AuthService $authService;

    public function __construct(Land $model,AuthService $authService)
    {
        $this->authService = $authService;
        parent::__construct($model);
    }

    public function getAllLandsQuery(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('real_state_address') && request('real_state_address') != null, function ($q)  {
            $q->where('real_state_address', 'like', '%' . request()->input('real_state_address') . '%');
        });

        $query->when(request()->has('department') && request('department') != null, function ($q)  {
            $q->where('department', '=',  request()->input('department'));
        });

        $query->when(request()->has('advertised_phone_number') && request('advertised_phone_number') != null, function ($q)  {
            $q->where('advertised_phone_number', '=', request()->input('advertised_phone_number'));
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

//        dd($query->toSql());
        return $query
            ->latest()
            ->select(['*'])
            ->with(['user'])
            ->where('user_id','=',$this->authService->checkGuard())
            ->where('status','=','waiting')
            ->paginate(10);


    }


}

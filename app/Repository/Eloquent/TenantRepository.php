<?php

namespace App\Repository\Eloquent;
use App\Models\Tenant;
use App\Repository\TenantRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class TenantRepository extends Repository implements TenantRepositoryInterface
{

    protected Model $model;

    public function __construct(Tenant $model)
    {
        parent::__construct($model);
    }



    public function tenants(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('card_number') && request('card_number') != null, function ($q)  {
            $q->where('card_number', '=',request()->input('card_number'));
        });

        $query->when(request()->has('phone') && request('phone') != null, function ($q)  {
            $q->where('phone', '=',request()->input('phone'));
        });


        return $query
            ->latest()
            ->select(['*'])
            ->with(['company'])
            ->where('company_id','=',auth('user-api')->user()->company_id)
            ->paginate(16);

    }

}

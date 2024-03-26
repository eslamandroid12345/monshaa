<?php

namespace App\Repository\Eloquent;

use App\Models\TechnicalSupport;
use App\Repository\TechnicalSupportRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupportRepository extends Repository implements TechnicalSupportRepositoryInterface
{

    protected Model $model;

    public function __construct(TechnicalSupport $model)
    {
        parent::__construct($model);
    }

    public function getAllMessages(): Paginator
    {
        $query = $this->model::query();

        $query->when(request()->has('company_phone') && request('company_phone') != null, function ($q)  {
            $q ->whereRelation('user','phone_of_company','=',request()->input('company_phone'));
        });

        return $query
            ->with(['user.company'])
            ->latest()
            ->simplePaginate(8);
    }
}

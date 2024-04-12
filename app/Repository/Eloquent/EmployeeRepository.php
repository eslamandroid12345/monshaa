<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends Repository implements EmployeeRepositoryInterface
{

    protected Model $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }


    public function getAllEmployees(): \Illuminate\Database\Eloquent\Collection|array
    {

        return $this->model::query()
        ->latest()
            ->select(['id','name','company_id'])
            ->with(['company'])
            ->where('company_id','=',companyId())
            ->get();
    }

    public function listOfCompanyEmployees(): \Illuminate\Database\Eloquent\Collection|array
    {

        $query = $this->model::query();

        $query->when(request()->has('phone') && request('phone') != null, function ($q)  {
            $q->where('phone', '=',request()->input('phone'));
        });

        $query->when(request()->has('card_number') && request('card_number') != null, function ($q)  {
            $q->where('card_number', '=',request()->input('card_number'));
        });

        return $query
        ->latest()
            ->with(['company'])
            ->where('company_id','=',companyId())
            ->where('is_admin','=',0)
            ->get();
    }

}

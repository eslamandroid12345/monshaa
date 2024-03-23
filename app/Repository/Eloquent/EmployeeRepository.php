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

}

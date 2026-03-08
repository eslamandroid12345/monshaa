<?php

namespace App\Repository\Eloquent;

use App\Models\EmployeeCommission;
use App\Repository\EmployeeCommissionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EmployeeCommissionRepository extends Repository implements EmployeeCommissionRepositoryInterface
{

    protected Model $model;

    public function __construct(EmployeeCommission $model)
    {
        parent::__construct($model);
    }

    public function getAllEmployeesCommissions(){

        $query = $this->model::query();

        $query->when(request()->filled('employee_id'), function ($q) {
            $q->where('employee_id', request()->input('employee_id'));
        });

        $query->when(request()->filled('date_from'), function ($q) {
            $q->where('transaction_date', '>=', request()->input('date_from'));
        });

        $query->when(request()->filled('date_to'), function ($q) {
            $q->where('transaction_date', '<=', request()->input('date_to'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company','employee'])
            ->where('company_id','=',companyId())
            ->paginate(50);

    }

    public function getCurrentTotalCommission()
    {
        return $this->model::query()->first()->total_commission ?? 0;
    }

}

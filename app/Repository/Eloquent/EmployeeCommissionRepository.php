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

        $query->when(request()->has('employee_id')  && request('employee_id') != null, function ($q) {
            $q->where('employee_id', request()->input('employee_id'));
        });

        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null && request('date_to') != null, function ($q) {
            $q->whereBetween('transaction_date', [request()->input('date_from'), request()->input('date_to')]);
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company','employee'])
            ->where('company_id','=',companyId())
            ->paginate(16);

    }

    public function getCurrentTotalCommission()
    {
        return $this->model::query()->first()->total_commission ?? 0;
    }

}

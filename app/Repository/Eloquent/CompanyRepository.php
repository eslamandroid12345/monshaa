<?php

namespace App\Repository\Eloquent;

use App\Models\Company;
use App\Models\User;
use App\Repository\CompanyRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{

    protected Model $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function getAllCompanies()
    {

        $query = $this->model::query();

        $query->when(request()->has('company_phone') && request('company_phone') != null, function ($q)  {
            $q->where('company_phone', '=',request()->input('company_phone'));
        });

        return $query
            ->latest()
            ->paginate(16);

    }

    public function countEmployees(): int
    {
        return User::query()
            ->where('company_id','=',companyId())
            ->where('is_admin','=',0)
            ->count();
    }

    public function checkCompanyLimit(): int
    {
        return auth('user-api')->user()->company->number_of_employees;
    }
}

<?php

namespace App\Repository\Eloquent;

use App\Models\Company;
use App\Models\User;
use App\Repository\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{

    protected Model $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
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

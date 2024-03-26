<?php

namespace App\Repository\Eloquent;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository implements UserRepositoryInterface
{

    protected Model $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsersOfCompany($companyId){

        return $this->model::query()
            ->where('company_id','=',$companyId)
            ->get();
    }
}

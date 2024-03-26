<?php

namespace App\Repository\Eloquent;

use App\Models\FcmToken;
use App\Repository\FcmTokenRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FcmTokenRepository extends Repository implements FcmTokenRepositoryInterface
{

    protected Model $model;

    public function __construct(FcmToken $model)
    {
        parent::__construct($model);
    }


    public function getAllDeviceTokenBelongsToCompany($companyId){

        return $this->model::query()
            ->whereHas('user', function ($q) use($companyId){
                $q->where('company_id','=',$companyId);
            })
            ->get();
    }
}

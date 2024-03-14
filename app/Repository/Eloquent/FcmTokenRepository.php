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
}

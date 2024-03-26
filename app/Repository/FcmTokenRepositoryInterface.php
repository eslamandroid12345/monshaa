<?php

namespace App\Repository;

interface FcmTokenRepositoryInterface extends RepositoryInterface
{

    public function getAllDeviceTokenBelongsToCompany($companyId);


    }

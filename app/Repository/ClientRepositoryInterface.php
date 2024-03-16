<?php

namespace App\Repository;

use Illuminate\Http\JsonResponse;

interface ClientRepositoryInterface extends RepositoryInterface
{

    public function getAllClients();


    }

<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Services\Client\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{

    public function __construct(
      private readonly ClientService $clientService
    )
    {
    }

    public function getAllClients(): JsonResponse{

       return  $this->clientService->getAllClients();

    }


    public function getAllEmployees(): JsonResponse{

        return  $this->clientService->getAllEmployees();

    }


    public function create(ClientRequest $request): JsonResponse{

        return  $this->clientService->create($request);

    }


    public function update($id,ClientRequest $request): JsonResponse{

        return  $this->clientService->update($id,$request);

    }


    public function show($id): JsonResponse{

        return  $this->clientService->show($id);

    }

    public function delete($id): JsonResponse{

        return  $this->clientService->delete($id);

    }
}

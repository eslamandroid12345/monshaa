<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Services\Client\ClientService;
use App\Models\Client;
use App\Models\State;

class ClientController extends Controller
{
    private ClientService $clientService;

    public function __construct(
      ClientService $clientService
    )
    {
        $this->clientService = $clientService;
    }

    public function getAllClients()
    {
       return  $this->clientService->getAllClients();
    }

    public function getAllEmployees()
    {
        return  $this->clientService->getAllEmployees();
    }

    public function create(ClientRequest $request)
    {
        return  $this->clientService->create($request);
    }

    public function update($id,ClientRequest $request)
    {
        return  $this->clientService->update($id,$request);
    }

    public function show($id)
    {
        return  $this->clientService->show($id);
    }
    public function edit($id){
        if (request()->ajax()) {
            $client = Client::query()->findOrFail($id);
            return view('admin.clients.edit',compact('client'));
        }
    }

    public function delete($id)
    {
        return  $this->clientService->delete($id);
    }
}

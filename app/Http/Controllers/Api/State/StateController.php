<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Services\State\StateService;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    private StateService $stateService;
    public function __construct(
       StateService $stateService
    )
    {
        $this->stateService = $stateService;
    }

    public function getAllStates(): JsonResponse{
        return  $this->stateService->getAllStates();
    }

    public function create(StateRequest $request){

        return  $this->stateService->create($request);
    }

    public function update($id,StateRequest $request): JsonResponse{

        return  $this->stateService->update($id,$request);
    }

    public function show($id): JsonResponse{
        return  $this->stateService->show($id);
    }

    public function changeStatus($id): JsonResponse{
        return  $this->stateService->changeStatus($id);
    }

    public function delete($id): JsonResponse{
        return  $this->stateService->delete($id);
    }
}

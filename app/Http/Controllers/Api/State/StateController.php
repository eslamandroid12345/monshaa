<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Services\State\StateService;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{

    protected StateService $stateService;

    public function __construct( StateService $stateService)
    {

        $this->stateService = $stateService;
    }

    public function getAllStates(): JsonResponse{


        return  $this->stateService->getAllStates();
    }


    public function filterGetAllStates(){

        return  $this->stateService->filterGetAllStates();

    }


    public function create(StateRequest $request){

        return  $this->stateService->create($request);

    }


    public function update($id,StateRequest $request){

        return  $this->stateService->update($id,$request);

    }


    public function show($id){

        return  $this->stateService->show($id);

    }


    public function changeStatus($id){

        return  $this->stateService->changeStatus($id);

    }


    public function delete($id){

        return  $this->stateService->delete($id);

    }
}

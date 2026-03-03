<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Http\Services\State\StateService;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class StateController extends Controller
{
    private StateService $stateService;
    public function __construct(
       StateService $stateService
    )
    {
        $this->stateService = $stateService;
    }

    public function getAllStates(){
        return  $this->stateService->getAllStates();
    }

    public function create(StateRequest $request){
        return  $this->stateService->create($request);
    }

    public function edit($id){
        if (request()->ajax()) {
            $state = State::query()->findOrFail($id);
            return view('admin.states.edit',compact('state'));
        }
    }

    public function update($id,StateRequest $request){

        return  $this->stateService->update($id,$request);
    }

    public function show($id): JsonResponse{
        return  $this->stateService->show($id);
    }

    public function changeStatus($id): JsonResponse{
        return  $this->stateService->changeStatus($id);
    }

    public function delete($id){
        return  $this->stateService->delete($id);
    }


    public function showView($id){
        $state = State::query()->findOrFail($id);
        Gate::authorize('check-company-auth',$state);
        return view('admin.states.show',compact('state'));
    }
}

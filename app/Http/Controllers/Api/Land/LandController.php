<?php

namespace App\Http\Controllers\Api\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandRequest;
use App\Http\Services\Land\LandService;
use App\Models\Land;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class LandController extends Controller
{
    private LandService $landService;


    public function __construct(
      LandService $landService
    )
    {
        $this->landService = $landService;
    }

    public function getAllLands(){
        return  $this->landService->getAllLands();
    }

    public function create(LandRequest $request){
        return  $this->landService->create($request);
    }

    public function update($id,LandRequest $request){

        return  $this->landService->update($id,$request);
    }

    public function show($id){
        return  $this->landService->show($id);
    }

    public function edit($id){
        if (request()->ajax()) {
            $land = Land::query()->findOrFail($id);
            return view('admin.lands.edit',compact('land'));
        }
    }

    public function changeStatus($id){

        return  $this->landService->changeStatus($id);
    }

    public function delete($id){
        return  $this->landService->delete($id);
    }

}

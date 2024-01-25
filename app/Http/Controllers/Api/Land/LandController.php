<?php

namespace App\Http\Controllers\Api\Land;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandRequest;
use App\Http\Services\Land\LandService;
use Illuminate\Http\JsonResponse;

class LandController extends Controller
{
    protected LandService $landService;

    public function __construct(LandService $landService)
    {

        $this->landService = $landService;
    }

    public function getAllLands(): JsonResponse{


        return  $this->landService->getAllLands();
    }


    public function create(LandRequest $request): JsonResponse{

        return  $this->landService->create($request);

    }


    public function update($id,LandRequest $request): JsonResponse{

        return  $this->landService->update($id,$request);

    }


    public function show($id): JsonResponse{

        return  $this->landService->show($id);

    }

    public function changeStatus($id): JsonResponse{

        return  $this->landService->changeStatus($id);

    }

    public function delete($id): JsonResponse{

        return  $this->landService->delete($id);

    }

}

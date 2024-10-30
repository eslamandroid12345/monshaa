<?php

namespace App\Http\Controllers\Api\Cash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CashRequest;
use App\Http\Services\Cash\CashService;
use Illuminate\Http\JsonResponse;

class CashController extends Controller
{
    public function __construct(
      private readonly CashService $cashService
    )
    {
        $this->middleware('permission:financial_cash');
    }


    public function getAllCashes(): JsonResponse
    {

       return $this->cashService->getAllCashes();

    }

    public function create($id,CashRequest $request): JsonResponse
    {

        return $this->cashService->create($id,$request);

    }


    public function update($id,CashRequest $request): JsonResponse
    {

        return $this->cashService->update($id,$request);

    }


    public function show($id): JsonResponse
    {

        return $this->cashService->show($id);

    }

    public function delete($id): JsonResponse
    {
        return $this->cashService->delete($id);

    }


}

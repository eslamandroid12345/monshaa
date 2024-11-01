<?php

namespace App\Http\Controllers\Api\TechnicalSupport;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalSupport\TechnicalSupportRequest;
use App\Http\Services\TechnicalSupport\TechnicalSupportService;
use Illuminate\Http\JsonResponse;

class TechnicalSupportController extends Controller
{

    public function __construct(
        private readonly TechnicalSupportService $technicalSupportService
    )
    {
        $this->middleware('permission:technical_support')->only('create');
    }


    public function getAllMessages(): JsonResponse
    {

        return $this->technicalSupportService->getAllMessages();

    }


    public function create(TechnicalSupportRequest $request): JsonResponse
    {

        return $this->technicalSupportService->create($request);
    }


}

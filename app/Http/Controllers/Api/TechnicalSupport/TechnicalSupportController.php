<?php

namespace App\Http\Controllers\Api\TechnicalSupport;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalSupport\TechnicalSupportRequest;
use App\Http\Services\TechnicalSupport\TechnicalSupportService;
use Illuminate\Http\JsonResponse;

class TechnicalSupportController extends Controller
{

    protected TechnicalSupportService $technicalSupportService;

    public function __construct(TechnicalSupportService $technicalSupportService)
    {
        $this->technicalSupportService = $technicalSupportService;
    }


    public function create(TechnicalSupportRequest $request): JsonResponse
    {

        return $this->technicalSupportService->create($request);
    }
}

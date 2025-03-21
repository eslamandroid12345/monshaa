<?php

namespace App\Http\Controllers\Api\Receipt;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiptRequest;
use App\Http\Services\Receipt\ReceiptService;
use Illuminate\Http\JsonResponse;

class ReceiptController extends Controller
{
    private ReceiptService $receiptService;
    public function __construct(
      ReceiptService $receiptService
    )
    {
        $this->middleware('permission:financial_receipt');
        $this->receiptService = $receiptService;
    }

    public function getAllReceipts(): JsonResponse
    {
        return $this->receiptService->getAllReceipts();
    }

    public function create($id,ReceiptRequest $request): JsonResponse
    {
        return $this->receiptService->create($id,$request);
    }

    public function update($id,ReceiptRequest $request): JsonResponse
    {
        return $this->receiptService->update($id,$request);
    }

    public function show($id): JsonResponse
    {
        return $this->receiptService->show($id);
    }

    public function delete($id): JsonResponse
    {
        return $this->receiptService->delete($id);
    }
}

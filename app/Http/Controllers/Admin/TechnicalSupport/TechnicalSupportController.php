<?php

namespace App\Http\Controllers\Admin\TechnicalSupport;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Admin\TechnicalSupport\TechnicalSupportService;

class TechnicalSupportController extends Controller
{
    private TechnicalSupportService $technicalSupportService;
    public function __construct(
      TechnicalSupportService $technicalSupportService
    )
    {
        $this->technicalSupportService = $technicalSupportService;
    }

    public function getAllMessages()
    {
        return $this->technicalSupportService->getAllMessages();
    }

}

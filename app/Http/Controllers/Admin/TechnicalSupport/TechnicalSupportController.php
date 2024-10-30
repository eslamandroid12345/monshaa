<?php

namespace App\Http\Controllers\Admin\TechnicalSupport;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Admin\TechnicalSupport\TechnicalSupportService;

class TechnicalSupportController extends Controller
{

    public function __construct(
      private readonly TechnicalSupportService $technicalSupportService
    )
    {
    }

    public function getAllMessages(){

        return $this->technicalSupportService->getAllMessages();
    }

}

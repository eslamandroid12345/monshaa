<?php

namespace App\Http\Services\Dashboard\Admin\TechnicalSupport;

use App\Repository\TechnicalSupportRepositoryInterface;

class TechnicalSupportService
{
    public function __construct(
      private readonly TechnicalSupportRepositoryInterface $technicalSupportRepository
    )
    {
    }


    public function getAllMessages(){

        $messages = $this->technicalSupportRepository->getAllMessages();

        return view('dashboard.technical_support.index',compact('messages'));

    }

}

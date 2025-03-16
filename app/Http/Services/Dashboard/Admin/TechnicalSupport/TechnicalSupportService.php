<?php

namespace App\Http\Services\Dashboard\Admin\TechnicalSupport;
use App\Repository\TechnicalSupportRepositoryInterface;

class TechnicalSupportService
{
    private TechnicalSupportRepositoryInterface $technicalSupportRepository;
    public function __construct(
      TechnicalSupportRepositoryInterface $technicalSupportRepository
    )
    {
        $this->technicalSupportRepository = $technicalSupportRepository;
    }

    public function getAllMessages(){

        $messages = $this->technicalSupportRepository->getAllMessages();
        return view('dashboard.technical_support.index',compact('messages'));
    }
}

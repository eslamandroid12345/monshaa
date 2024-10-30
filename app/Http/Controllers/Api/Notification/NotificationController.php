<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use App\Http\Services\Notification\NotificationService;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{


    public function __construct(
       private readonly NotificationService $notificationService
    )
    {

    }


    public function all(): JsonResponse
    {

        return $this->notificationService->getAllNotifications();
    }

}

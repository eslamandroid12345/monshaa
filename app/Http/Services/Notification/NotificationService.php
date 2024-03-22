<?php

namespace App\Http\Services\Notification;

use App\Http\Resources\Notification\NotificationResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\NotificationRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class NotificationService
{

    use Responser;
    protected NotificationRepositoryInterface $notificationRepository;

    protected GetService $getService;

    public function __construct(NotificationRepositoryInterface $notificationRepository, GetService $getService)
    {
        $this->notificationRepository = $notificationRepository;
        $this->getService = $getService;
    }

    public function getAllNotifications(): JsonResponse
    {
        try {

        return $this->getService->handle(resource: NotificationResource::class,repository: $this->notificationRepository,method: 'getAllNotifications',message: 'نم الحصول علي جميع الاشعارات بنجاح');

      }  catch (AuthorizationException $exception){
       return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

       } catch (\Exception $e) {
         return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

       }
    }

}

<?php

namespace App\Http\Services\TechnicalSupport;

use App\Http\Requests\TechnicalSupport\TechnicalSupportRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\TechnicalSupport\TechnicalSupportResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\TechnicalSupportRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class TechnicalSupportService
{

    use Responser;
    protected TechnicalSupportRepositoryInterface $technicalSupportRepository;

    protected GetService $getService;

    public function __construct(TechnicalSupportRepositoryInterface $technicalSupportRepository,GetService $getService)
    {

        $this->technicalSupportRepository = $technicalSupportRepository;
       $this->getService = $getService;
    }

    public function getAllMessages(): JsonResponse
    {


        return $this->getService->handle(resource: TechnicalSupportResource::class,repository: $this->technicalSupportRepository,method: 'getAllMessages',message: 'تم الحصول علي جميع رسائل الدعم الفني بنجاح');

    }

    public function create(TechnicalSupportRequest $request): JsonResponse
    {

        try {

            $inputs = $request->validated();

            $inputs['user_id'] = employeeId();

            $this->technicalSupportRepository->create($inputs);

            return $this->responseSuccess(null,200,'تم ارسال الرساله الي الشركه يرجي الانتظار الي حين الرد عليكم...');

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }

}

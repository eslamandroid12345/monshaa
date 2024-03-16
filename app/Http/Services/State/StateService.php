<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\StateRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;


class StateService
{

    use Responser,FirebaseNotification;
    protected StateRepositoryInterface $stateRepository;

    protected FileManagerService $fileManagerService;
    protected GetService $getService;

    public function __construct(StateRepositoryInterface $stateRepository,FileManagerService $fileManagerService,GetService $getService)
    {

        $this->stateRepository = $stateRepository;
        $this->fileManagerService = $fileManagerService;
        $this->getService = $getService;
    }


    public function getAllStates(): JsonResponse
    {

        try {

            return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getAllStatusQuery',message:'تم الحصول على بيانات جميع العقارات بنجاح' );

        }  catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }

    }

    public function create(StateRequest $request): JsonResponse
    {
        try {

        $inputs = $request->validated();

        $inputs['user_id'] = employeeId();
        $inputs['company_id'] = companyId();

        if($request->hasFile('real_state_images')){

            $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images");
            $inputs['real_state_images'] = json_encode($images);
        }

        $state = $this->stateRepository->create($inputs);

        $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات عقار جديد لديك بواسطه   ' . employee() ],userId: employeeId(),permission: 'states');

        return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$state->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );

    } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function update($id,StateRequest $request): JsonResponse
    {

        try {

            $state = $this->stateRepository->getById($id);

            Gate::authorize('check-company-auth',$state);

            $inputs = $request->validated();

            if($request->hasFile('real_state_images')){

                $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images",$state->getRawOriginal('real_state_images'));
                $inputs['real_state_images'] = json_encode($images);
            }

            $this->stateRepository->update($state->id,$inputs);

            return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم تعديل بيانات العقار  بنجاح' );

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات العقار غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }
    }


    public function show($id): JsonResponse
    {

        try {

            $state = $this->stateRepository->getById($id);

            Gate::authorize('check-company-auth',$state);

            return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات العقار  بنجاح' );

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات العقار غير موجوده',404);

        }
    }


    public function changeStatus($id): JsonResponse
    {

        try {

            $state = $this->stateRepository->getById($id);

            Gate::authorize('check-company-auth',$state);

            $this->stateRepository->update($state->id,['status' => $state->department]);

            return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم تغيير حاله العقار  بنجاح' );


        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات العقار غير موجوده',404);

        }
    }


    public function delete($id): JsonResponse
    {
        try {
            $state = $this->stateRepository->getById($id);

            Gate::authorize('check-company-auth',$state);

            $this->stateRepository->deleteWithMultipleFiles($state->id,$state->getRawOriginal('real_state_images'));

            return $this->responseSuccess(null, 200, 'تم حذف بيانات العقار  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات العقار غير موجوده',404);

        }
    }


}

<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\StateRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;


class StateService
{

    use Responser;
    protected StateRepositoryInterface $stateRepository;

    protected FileManagerService $fileManagerService;

    public function __construct(StateRepositoryInterface $stateRepository,FileManagerService $fileManagerService)
    {

        $this->stateRepository = $stateRepository;
        $this->fileManagerService = $fileManagerService;
    }


    public function getAllStates(): JsonResponse
    {

        try {
            $states = $this->stateRepository->getAllStatusQuery();

            return $this->responseSuccess(StateResource::collection($states)->response()->getData(true), 200, 'تم الحصول على بيانات جميع العقارات بنجاح');

        }  catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }

    public function create(StateRequest $request): JsonResponse
    {
        try {

        $inputs = $request->validated();

        $inputs['user_id'] = auth('user-api')->id();
        $inputs['company_id'] = auth('user-api')->user()->company_id;

        if($request->hasFile('real_state_images')){

            $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images");
            $inputs['real_state_images'] = json_encode($images);
        }

        $state = $this->stateRepository->create($inputs);

        return $this->responseSuccess(new StateResource($state), 200, 'تم اضافه البيانات بنجاح');

    } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

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

            return $this->responseSuccess(new StateResource($this->stateRepository->getById($id)), 200, 'تم تعديل بيانات العقار  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات العقار غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function show($id): JsonResponse
    {

        try {

            $state = $this->stateRepository->getById($id);

            Gate::authorize('check-company-auth',$state);

            return $this->responseSuccess(new StateResource($state), 200, 'تم عرض بيانات العقار  بنجاح');

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

            return $this->responseSuccess(new StateResource($this->stateRepository->getById($id)), 200, 'تم تغيير حاله العقار  بنجاح');

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

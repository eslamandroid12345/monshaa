<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\AuthService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\StateRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class StateService
{

    use Responser;


    protected StateRepositoryInterface $stateRepository;

    protected AuthService $authService;

    protected FileManagerService $fileManagerService;

    public function __construct(StateRepositoryInterface $stateRepository,AuthService $authService,FileManagerService $fileManagerService)
    {

        $this->stateRepository = $stateRepository;
        $this->authService = $authService;
        $this->fileManagerService = $fileManagerService;
    }


    public function getAllStates(): JsonResponse
    {

            $states = $this->stateRepository->getAllStatusQuery();

            return $this->responseSuccess(StateResource::collection($states)->response()->getData(true), 200, 'تم الحصول على بيانات جميع العقارات بنجاح');

    }


    public function create(StateRequest $request)
    {

        $inputs = $request->validated();

        $inputs['user_id'] = $this->authService->checkGuard();
        $inputs['employee_id'] = $this->authService->checkEmployeeGuard();

        if($request->hasFile('real_state_images')){

            $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images");
            $inputs['real_state_images'] = json_encode($images);
        }

        $state = $this->stateRepository->create($inputs);

        return $this->responseSuccess(new StateResource($state), 200, 'تم اضافه البيانات بنجاح');


    }


    public function update($id,StateRequest $request): JsonResponse
    {


            $state = $this->stateRepository->getById($id);

            $inputs = $request->validated();

            $inputs['user_id'] = $this->authService->checkGuard();
            $inputs['employee_id'] = $this->authService->checkEmployeeGuard();

            if($request->hasFile('real_state_images')){

                $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images",$state->getRawOriginal('real_state_images'));
                $inputs['real_state_images'] = json_encode($images);
            }

            $this->stateRepository->update($state->id,$inputs);

            return $this->responseSuccess(new StateResource($this->stateRepository->getById($id)), 200, 'تم تعديل بيانات العقار  بنجاح');

    }


    public function show($id): JsonResponse
    {


        $state = $this->stateRepository->getById($id);

        return $this->responseSuccess(new StateResource($state), 200, 'تم عرض بيانات العقار  بنجاح');

    }


    public function changeStatus($id): JsonResponse
    {

            $state = $this->stateRepository->getById($id);

            $this->stateRepository->update($state->id,['status' => $state->department]);

            return $this->responseSuccess(new StateResource($this->stateRepository->getById($id)), 200, 'تم تغيير حاله العقار  بنجاح');

    }


    public function delete($id): JsonResponse
    {
            $state = $this->stateRepository->getById($id);

            $this->stateRepository->deleteWithMultipleFiles($state->id,$state->getRawOriginal('real_state_images'));

            return $this->responseSuccess(null, 200, 'تم حذف بيانات العقار  بنجاح');

    }


}

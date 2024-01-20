<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\AuthService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\Eloquent\StateRepositoryInterface;
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


    public function filterGetAllStates(){


    }


    public function create(StateRequest $request): JsonResponse
    {

        try {

        $inputs = $request->validated();

        $inputs['user_id'] = $this->authService->checkGuard();
        $inputs['employee_id'] = $this->authService->checkEmployeeGuard();

        if($request->hasFile('real_state_images')){

            $images = $this->fileManagerService->handleMultipleImages("real_state_images","states/images");
            $inputs['real_state_images'] = $images;
        }

        $state = $this->stateRepository->create($inputs);

        return $this->responseSuccess(new StateResource($state), 200, 'تم اضافه البيانات بنجاح');

    } catch (\Exception $exception) {

        return $this->responseFail(null, 500, $exception->getMessage(), 500);

        }
    }


    public function update($id,StateRequest $request){


    }


    public function show($id){


    }


    public function changeStatus($id){


    }


    public function delete($id){


    }


}

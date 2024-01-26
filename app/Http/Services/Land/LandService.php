<?php

namespace App\Http\Services\Land;

use App\Http\Requests\LandRequest;
use App\Http\Resources\LandResource;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\AuthService;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\LandRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class LandService
{

    use Responser;
    protected LandRepositoryInterface $landRepository;

    protected AuthService $authService;

    protected FileManagerService $fileManagerService;

    public function __construct(LandRepositoryInterface $landRepository,AuthService $authService,FileManagerService $fileManagerService)
    {

        $this->landRepository = $landRepository;
        $this->authService = $authService;
        $this->fileManagerService = $fileManagerService;
    }


    public function getAllLands(): JsonResponse
    {

        $lands = $this->landRepository->getAllLandsQuery();

        return $this->responseSuccess(LandResource::collection($lands)->response()->getData(true), 200, 'تم الحصول على بيانات جميع الاراضي بنجاح');

    }


    public function create(LandRequest $request): JsonResponse
    {
        try {

            $inputs = $request->validated();

            $inputs['user_id'] = $this->authService->checkGuard();
            $inputs['employee_id'] = $this->authService->checkEmployeeGuard();

            if($request->hasFile('land_images')){

                $images = $this->fileManagerService->handleMultipleImages("land_images","lands/images");
                $inputs['land_images'] = json_encode($images);
            }

            $land = $this->landRepository->create($inputs);

            return $this->responseSuccess(new LandResource($land), 200, 'تم اضافه البيانات بنجاح');

        } catch (\Exception $exception) {

            return $this->responseFail(null, 500, $exception->getMessage(), 500);

        }
    }


    public function update($id,LandRequest $request): JsonResponse
    {

        try {

            $land = $this->landRepository->getById($id);

            $inputs = $request->validated();

            $inputs['user_id'] = $this->authService->checkGuard();
            $inputs['employee_id'] = $this->authService->checkEmployeeGuard();

            if($request->hasFile('land_images')){

                $images = $this->fileManagerService->handleMultipleImages("land_images","land/images",$land->getRawOriginal('land_images'));
                $inputs['land_images'] = json_encode($images);
            }

            $this->landRepository->update($land->id,$inputs);

            return $this->responseSuccess(new LandResource($this->landRepository->getById($id)), 200, 'تم تعديل بيانات الارض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الارض غير موجوده',404);

        }
    }


    public function show($id): JsonResponse
    {

        try {

            $land = $this->landRepository->getById($id);

            return $this->responseSuccess(new LandResource($land), 200, 'تم عرض بيانات الارض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الارض غير موجوده',404);

        }
    }


    public function changeStatus($id): JsonResponse
    {

        try {
            $land = $this->landRepository->getById($id);

            $this->landRepository->update($land->id,['status' => 'sale']);

            return $this->responseSuccess(new LandResource($this->landRepository->getById($id)), 200, 'تم تغيير حاله الارض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الارض غير موجوده',404);

        }
    }


    public function delete($id): JsonResponse
    {
        try {
            $land = $this->landRepository->getById($id);

            $this->landRepository->deleteWithMultipleFiles($land->id,$land->getRawOriginal('land_images'));

            return $this->responseSuccess(null, 200, 'تم حذف بيانات الارض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الارض غير موجوده',404);

        }
    }


}

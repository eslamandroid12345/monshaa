<?php

namespace App\Http\Services\Land;

use App\Http\Requests\LandRequest;
use App\Http\Resources\LandResource;
use App\Http\Resources\StateResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\LandRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class LandService
{

    use Responser,FirebaseNotification;
    protected LandRepositoryInterface $landRepository;

    protected FileManagerService $fileManagerService;
    protected GetService $getService;

    public function __construct(LandRepositoryInterface $landRepository,FileManagerService $fileManagerService,GetService $getService)
    {

        $this->landRepository = $landRepository;
        $this->fileManagerService = $fileManagerService;
        $this->getService = $getService;
    }


    public function getAllLands(): JsonResponse
    {

        try {
            return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'getAllLandsQuery',message:'تم الحصول على بيانات جميع الاراضي بنجاح' );

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function create(LandRequest $request): JsonResponse
    {

        try {

            $inputs = $request->validated();

            $inputs['user_id'] = employeeId();
            $inputs['company_id'] = companyId();

            if ($request->hasFile('land_images')) {

                $images = $this->fileManagerService->handleMultipleImages("land_images", "lands/images");
                $inputs['land_images'] = json_encode($images);
            }

            $land = $this->landRepository->create($inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات ارض جديده لديك بواسطه   ' . employee() ],userId: employeeId(),permission: 'lands');

            return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'getById',parameters: [$land->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );


        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);


        }
    }


    public function update($id,LandRequest $request): JsonResponse
    {

        try {

            $land = $this->landRepository->getById($id);

            Gate::authorize('check-company-auth',$land);


            $inputs = $request->validated();

            if ($request->hasFile('land_images')) {

                $images = $this->fileManagerService->handleMultipleImages("land_images", "land/images", $land->getRawOriginal('land_images'));
                $inputs['land_images'] = json_encode($images);
            }

            $this->landRepository->update($land->id, $inputs);


            return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات الارض  بنجاح' );


        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات الارض غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);


        }
    }


    public function show($id): JsonResponse
    {

        try {

            $land = $this->landRepository->getById($id);

            Gate::authorize('check-company-auth',$land);

            return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات الارض  بنجاح' );

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات الارض غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }
    }


    public function changeStatus($id): JsonResponse
    {
        try {

            $land = $this->landRepository->getById($id);

            Gate::authorize('check-company-auth',$land);

            $this->landRepository->update($land->id, ['status' => 'sale']);


            return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم تغيير حاله الارض  بنجاح' );


        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات الارض غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);


        }

    }


    public function delete($id): JsonResponse
    {
        try {

            $land = $this->landRepository->getById($id);

            Gate::authorize('check-company-auth',$land);

            $this->landRepository->deleteWithMultipleFiles($land->id, $land->getRawOriginal('land_images'));

            return $this->responseSuccess(null, 200, 'تم حذف بيانات الارض  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات الارض غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }
    }


}

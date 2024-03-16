<?php

namespace App\Http\Services\Client;

use App\Http\Requests\Client\ClientRequest;
use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Client\ClientShowResource;
use App\Http\Resources\Client\ListEmployeeResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\ClientRepositoryInterface;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ClientService
{

    use Responser;
    protected ClientRepositoryInterface $clientRepository;
    protected EmployeeRepositoryInterface $employeeRepository;
    protected GetService $getService;

    public function __construct(ClientRepositoryInterface $clientRepository,GetService $getService, EmployeeRepositoryInterface $employeeRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->getService = $getService;
        $this->employeeRepository = $employeeRepository;
    }


    public function getAllClients(): JsonResponse{

        try {

            return $this->getService->handle(resource: ClientResource::class,repository: $this->clientRepository,method: 'getAllClients',message: 'تم الحصول على بيانات جميع العملاء بنجاح');

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function getAllEmployees(): JsonResponse{

        try {

            return $this->getService->handle(resource: ListEmployeeResource::class,repository: $this->employeeRepository,method: 'getAllEmployees',message: 'تم الحصول على بيانات جميع موظفين الشركه بنجاح',dataType: 'get');

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function create(ClientRequest $request): JsonResponse{


        try {

            $inputs = $request->validated();

            $inputs['company_id'] = auth('user-api')->user()->company_id;
            $inputs['user_id'] = auth('user-api')->id();

            $client = $this->clientRepository->create($inputs);

            return $this->responseSuccess(new ClientShowResource($client), 200, 'تم اضافه البيانات بنجاح');

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);
        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id,ClientRequest $request): JsonResponse{

        DB::beginTransaction();
        try {

            $client = $this->clientRepository->getById($id);

            Gate::authorize('check-company-auth',$client);

            $inputs = $request->validated();
            $this->clientRepository->update($client->id,$inputs);

            DB::commit();

            return $this->responseSuccess(new ClientShowResource($this->clientRepository->getById($id)), 200, 'تم تعديل بيانات العميل بنجاح');

        }catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات العميل غير موجوده', 404);

        } catch (AuthorizationException $exception){
            DB::rollBack();
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function show($id): JsonResponse{


            $client = $this->clientRepository->getById($id);
            Gate::authorize('check-company-auth',$client);

            return $this->getService->handle(resource: ClientShowResource::class,repository: $this->clientRepository, method: 'getById',parameters: [$id], is_instance: true, message: 'تم الحصول على بيانات العميل بنجاح');

    }

    public function delete($id): JsonResponse{

        try {

            $client = $this->clientRepository->getById($id);

            Gate::authorize('check-company-auth',$client);

            $this->clientRepository->delete($client->id);

            return $this->responseSuccess(null, 200, 'تم حذف بيانات العميل  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات العميل غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }

}

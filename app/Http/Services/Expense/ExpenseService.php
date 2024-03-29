<?php

namespace App\Http\Services\Expense;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\ExpenseRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ExpenseService
{

    use Responser,FirebaseNotification;
    protected ExpenseRepositoryInterface $expenseRepository;
    protected GetService $getService;

    public function __construct(ExpenseRepositoryInterface $expenseRepository,GetService $getService)
    {
        $this->expenseRepository = $expenseRepository;
        $this->getService = $getService;
    }


    public function getAllExpenses(): JsonResponse{

        try {

            return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'getAllExpenses',message:'تم الحصول على بيانات جميع المصروفات بنجاح' );

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);


        }

    }


    public function getAllRevenues(): JsonResponse{

        try {

            return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'getAllRevenues',message:'تم الحصول على بيانات جميع الايردات بنجاح' );

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function create(StoreExpenseRequest $request): JsonResponse{


        try {

            $inputs = $request->validated();

            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();

            $expense = $this->expenseRepository->create($inputs);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه مصروف جديد لديك بواسطه '. employee() ],userId: employeeId(),permission: 'expenses');

            return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'getById',parameters: [$expense->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );
        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function update($id, UpdateExpenseRequest $request): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);

            Gate::authorize('check-company-auth',$expense);

            $inputs = $request->validated();
            $this->expenseRepository->update($expense->id,$inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم تعديل مصروف  لديك بواسطه '. employee() ],userId:employeeId(),permission: 'expenses');

            return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل البيانات بنجاح' );

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المصروف غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function show($id): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);
            Gate::authorize('check-company-auth',$expense);
            return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات المصروف بنجاح' );

        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات المصروف غير موجوده', 404);

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);
        }

    }

    public function delete($id): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);

            Gate::authorize('check-company-auth',$expense);

            $this->expenseRepository->delete($expense->id);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف مصروف  لديك بواسطه '. employee() ],userId:employeeId(),permission: 'expenses');

            return $this->responseSuccess(null, 200, 'تم حذف بيانات المصروف  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المصروف غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }

    }

}

<?php

namespace App\Http\Services\Expense;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Http\Resources\Revenue\RevenueResource;
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

    public function __construct(
      private readonly ExpenseRepositoryInterface $expenseRepository,
      private readonly GetService $getService
    )
    {
    }


    public function getAllExpenses(): JsonResponse{

        try {

            $data = $this->expenseRepository->getAllExpenses();

            return $this->responseSuccess(data: ExpenseResource::collection($data)->response()->getData(true),code: 200,message: 'تم الحصول على بيانات جميع المصروفات بنجاح',status: 200,newAttributeName: 'total',newAttributeValue: $this->expenseRepository->getCurrentExpensesTotal());

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }

    public function getAllRevenues(): JsonResponse
    {

        try {

            $data = $this->expenseRepository->getAllRevenues();

            return $this->responseSuccess(data: RevenueResource::collection($data)->response()->getData(true),code: 200,message: 'تم الحصول على بيانات جميع الايردات بنجاح',status: 200,newAttributeName: 'total',newAttributeValue: $this->expenseRepository->getCurrentRevenuesTotal());

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }

    public function create(StoreExpenseRequest $request): JsonResponse
    {

        try {

            $inputs = $request->validated();

            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();

            $expense = $this->expenseRepository->create($inputs);

            $messageFirebase = $expense->type == 'expense' ? ' تم اضافه مصروف جديد لديك بواسطه ': ' تم اضافه ايراد جديد لديك بواسطه ';

            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';

            $resource = $expense->type == 'expense' ? ExpenseResource::class : RevenueResource::class;

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId: employeeId(),permission: $permission);

            return $this->getService->handle(resource: $resource,repository: $this->expenseRepository,method: 'getById',parameters: [$expense->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );
        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'ليس لديك صلاحيه علي هذا',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id, UpdateExpenseRequest $request): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);

            Gate::authorize('check-company-auth',$expense);

            Gate::authorize('check-user-auth',$expense);

            $inputs = $request->validated();

            $this->expenseRepository->update($expense->id,$inputs);

            $messageFirebase = $expense->type == 'expense' ? 'تم تعديل مصروف لديك بواسطه ': 'تم تعديل ايراد لديك بواسطه ';

            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';

            $resource = $expense->type == 'expense' ? ExpenseResource::class : RevenueResource::class;

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId:employeeId(),permission: $permission);

            return $this->getService->handle(resource: $resource,repository: $this->expenseRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل البيانات بنجاح' );

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'البيانات غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'ليس لديك صلاحيه علي هذا',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function show($id): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);
            Gate::authorize('check-company-auth',$expense);

            $resource = $expense->type == 'expense' ? ExpenseResource::class : RevenueResource::class;

            return $this->getService->handle(resource: $resource,repository: $this->expenseRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات المصروف بنجاح' );

        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'البيانات غير موجوده', 404);

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);
        }

    }

    public function delete($id): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);

            Gate::authorize('check-company-auth',$expense);

            Gate::authorize('check-user-auth',$expense);

            $messageFirebase = $expense->type == 'expense' ? 'تم حذف مصروف لديك بواسطه ': 'تم حذف ايراد لديك بواسطه ';

            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId:employeeId(),permission: $permission);

            $this->expenseRepository->delete($expense->id);

            return $this->responseSuccess(null, 200, 'تم حذف البيانات  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'البيانات غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'ليس لديك صلاحيه علي هذا',403);

        }

    }

}

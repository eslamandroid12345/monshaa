<?php

namespace App\Http\Services\Expense;

use App\Http\Requests\ExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Http\Traits\Responser;
use App\Repository\ExpenseRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ExpenseService
{

    use Responser;
    protected ExpenseRepositoryInterface $expenseRepository;

    public function __construct(ExpenseRepositoryInterface $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }


    public function getAllExpenses(): JsonResponse{

        try {
            $expenses = $this->expenseRepository->getAllExpenses();

            return $this->responseSuccess(ExpenseResource::collection($expenses)->response()->getData(true), 200, 'تم الحصول على بيانات جميع المصروفات بنجاح');

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function getAllRevenues(): JsonResponse{

        try {
            $expenses = $this->expenseRepository->getAllRevenues();

            return $this->responseSuccess(ExpenseResource::collection($expenses)->response()->getData(true), 200, 'تم الحصول على بيانات جميع الايردات بنجاح');

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function create(ExpenseRequest $request): JsonResponse{


        try {

            $inputs = $request->validated();

            $inputs['company_id'] = auth('user-api')->user()->company_id;
            $inputs['user_id'] = auth('user-api')->id();

            $expense = $this->expenseRepository->create($inputs);

            return $this->responseSuccess(new ExpenseResource($expense), 200, 'تم اضافه البيانات بنجاح');

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id,ExpenseRequest $request): JsonResponse{

        try {

            $expense = $this->expenseRepository->getById($id);

            Gate::authorize('check-company-auth',$expense);

            $inputs = $request->validated();


            $this->expenseRepository->update($expense->id,$inputs);

            return $this->responseSuccess(new ExpenseResource($this->expenseRepository->getById($id)), 200, 'تم تعديل المصروف بنجاح');

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

            return $this->responseSuccess(new ExpenseResource($this->expenseRepository->getById($id)), 200, 'تم عرض بيانات المصروف بنجاح');

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

            return $this->responseSuccess(null, 200, 'تم حذف بيانات المصروف  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المصروف غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }

    }

}

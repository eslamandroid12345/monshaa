<?php

namespace App\Http\Controllers\Api\Expense;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Services\Expense\ExpenseService;
use Illuminate\Http\JsonResponse;

class ExpenseController extends Controller
{
    protected ExpenseService $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;

    }


    public function getAllRevenues(): JsonResponse{


        return  $this->expenseService->getAllRevenues();
    }

    public function getAllExpenses(): JsonResponse{


        return  $this->expenseService->getAllExpenses();
    }


    public function create(StoreExpenseRequest $request){

        return  $this->expenseService->create($request);

    }


    public function update($id, UpdateExpenseRequest $request): JsonResponse{

        return  $this->expenseService->update($id,$request);


    }


    public function show($id): JsonResponse{

        return  $this->expenseService->show($id);


    }

    public function delete($id): JsonResponse{

        return  $this->expenseService->delete($id);


    }
}

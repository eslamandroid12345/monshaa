<?php

namespace App\Http\Controllers\Api\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use App\Http\Services\Expense\ExpenseService;
use App\Models\Expense;

class ExpenseController extends Controller
{
    private ExpenseService $expenseService;

    public function __construct(
     ExpenseService $expenseService
    )
    {
        $this->expenseService = $expenseService;
    }


    public function getAllRevenues()
    {
        return  $this->expenseService->getAllRevenues();
    }

    public function getAllExpenses(){
        return  $this->expenseService->getAllExpenses();
    }

    public function create(StoreExpenseRequest $request){

        return  $this->expenseService->create($request);
    }

    public function update($id, UpdateExpenseRequest $request){

        return  $this->expenseService->update($id,$request);
    }

    public function show($id){

        return  $this->expenseService->show($id);
    }

    public function editRevenue($id){
        if (request()->ajax()) {
            $revenue = Expense::query()->findOrFail($id);
            return view('admin.revenues.edit',compact('revenue'));
        }
    }

    public function editExpense($id){
        if (request()->ajax()) {
            $revenue = Expense::query()->findOrFail($id);
            return view('admin.expenses.edit',compact('revenue'));
        }
    }

    public function delete($id){

        return  $this->expenseService->delete($id);

    }
}

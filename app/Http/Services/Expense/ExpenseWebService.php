<?php

namespace App\Http\Services\Expense;

use App\Http\Requests\Expense\StoreExpenseRequest;
use App\Http\Requests\Expense\UpdateExpenseRequest;
use Illuminate\Support\Facades\Gate;

class ExpenseWebService extends ExpenseService
{

    public function getAllExpenses(){

        try {
            $revenues = $this->expenseRepository->getAllExpenses();
            $total = $this->expenseRepository->getCurrentExpensesTotal();
            return view('admin.expenses.index', compact('revenues','total'));
        }catch (\Exception $e) {
            return redirect()->back()->with('expense_index_error','يوجد خطاء اثناء عرض بيانات المصروفات يرجي اعاده المحاوله!');
        }
    }

    public function getAllRevenues()
    {
        try {
            $revenues = $this->expenseRepository->getAllRevenues();
            $total = $this->expenseRepository->getCurrentRevenuesTotal();
            return view('admin.revenues.index', compact('revenues','total'));
        } catch (\Exception $e) {
            return redirect()->back()->with('revenue_index_error','يوجد خطاء اثناء عرض بيانات الايرادات يرجي اعاده المحاوله!');

        }
    }

    public function create(StoreExpenseRequest $request)
    {
        try {
            $inputs = $request->validated();
            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();
            $expense = $this->expenseRepository->create($inputs);
            $messageFirebase = $expense->type == 'expense' ? ' تم اضافه مصروف جديد لديك بواسطه ': ' تم اضافه ايراد جديد لديك بواسطه ';
            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';

            $message = $expense->type == 'expense' ? 'تم اضافه المصروف بنجاح' : 'تم اضافه الايراد بنجاح';
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId: employeeId(),permission: $permission);

            return redirect()->back()->with('revenue_create',$message);

        } catch (\Exception $e) {
            return redirect()->back()->with('revenue_create_error','يوجد خطاء اثناء تسجيل البيانات يرجي اعاده المحاوله!');

        }
    }

    public function update($id, UpdateExpenseRequest $request){

        try {
            $expense = $this->expenseRepository->getById($id);
            Gate::authorize('check-company-auth',$expense);
            Gate::authorize('check-user-auth',$expense);
            $inputs = $request->validated();
            $this->expenseRepository->update($expense->id,$inputs);
            $messageFirebase = $expense->type == 'expense' ? 'تم تعديل مصروف لديك بواسطه ': 'تم تعديل ايراد لديك بواسطه ';
            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';

            $message = $expense->type == 'expense' ? 'تم تحديث بيانات المصروف بنجاح' : 'تم تحديث بيانات الايراد بنجاح';

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId:employeeId(),permission: $permission);

            return redirect()->back()->with('revenue_update',$message);

        }catch (\Exception $e) {
            return redirect()->back()->with('revenue_create_error','يوجد خطاء اثناء تعديل البيانات يرجي اعاده المحاوله!');

        }
    }

    public function show($id){

        try {
            $expense = $this->expenseRepository->getById($id);
            Gate::authorize('check-company-auth',$expense);
            return $expense->type == 'expense' ? view('admin.expenses.show', compact('expense')) : view('admin.revenues.show', compact('expense'));

        }catch (\Exception $e) {
            return redirect()->back()->with('revenue_show_error','يوجد خطاء اثناء عرض البيانات يرجي اعاده المحاوله!');

        }
    }

    public function delete($id){

        try {
            $expense = $this->expenseRepository->getById($id);
            Gate::authorize('check-company-auth',$expense);
            Gate::authorize('check-user-auth',$expense);
            $messageFirebase = $expense->type == 'expense' ? 'تم حذف مصروف لديك بواسطه ': 'تم حذف ايراد لديك بواسطه ';
            $permission =  $expense->type == 'expense' ? 'expenses' : 'revenue';
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => $messageFirebase . employee() ],userId:employeeId(),permission: $permission);
            $this->expenseRepository->delete($expense->id);

            return redirect()->back()->with('revenue_delete','تم حذف البيانات بنجاح!');

        } catch (\Exception $e) {
            return redirect()->back()->with('revenue_delete_error','يوجد خطاء اثناء حذف البيانات!');

        }
    }
}

<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'real_state_address' => 'nullable|required_if:type,revenue',
            'tenant_name' => 'nullable|required_if:type,revenue',
            'owner_name' => 'nullable|required_if:type,revenue',
            'total_money' => 'required|numeric',
            'description' => 'required|max:255',
            'transaction_date' => 'required|date|date_format:Y-m-d',
            'type' => 'nullable|in:expense,revenue'
        ];
    }


    public function messages(): array
    {
        return [
            'real_state_address.required_if' => 'حقل عنوان العقار مطلوب عندما يكون نوع العملية إيراد.',
            'tenant_name.required_if' => 'حقل  اسم المستاجر مطلوب عندما يكون نوع العملية إيراد.',
            'owner_name.required_if' => 'حقل اسم المالك مطلوب عندما يكون نوع العملية إيراد.',
            'total_money.required' => 'المبلغ الإجمالي مطلوب.',
            'total_money.numeric' => 'يجب أن يكون المبلغ الإجمالي رقمًا.',
            'description.required' => 'الوصف مطلوب.',
            'description.max' => 'يجب ألا يتجاوز الوصف 255 حرفًا.',
            'transaction_date.required' => 'تاريخ المعاملة مطلوب.',
            'transaction_date.date' => 'يجب أن يكون تاريخ المعاملة تاريخًا صحيحًا.',
            'transaction_date.date_format' => 'يجب أن يكون تاريخ المعاملة بالصيغة التالية: YYYY-MM-DD.',
            'type.in' => 'نوع الحركه مصروف ولا ايراد جديد للشركه'

        ];
    }
}

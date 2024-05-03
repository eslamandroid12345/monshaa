<?php

namespace App\Http\Requests\EmployeeCommission;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCommissionRequest extends FormRequest
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

            'employee_id' => 'required|exists:users,id',
            'total_money' => 'required|numeric|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'description' => 'required|max:255',
            'real_state_address' => 'required|max:255',
            'owner_name' => 'required|max:255',
            'transaction_date' => 'required|date|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'employee_id.required' => 'حقل رقم معرف الموظف مطلوب.',
            'employee_id.exists' => 'رقم معرف الموظف غير موجود.',
            'total_money.required' => 'حقل المبلغ الإجمالي مطلوب.',
            'total_money.numeric' => 'يجب أن يكون الحقل المالي عددًا.',
            'total_money.regex' => 'قيمه عموله الموظف كبير جدا.',
            'description.required' => 'حقل الوصف مطلوب.',
            'description.max' => 'يجب ألا يتجاوز حقل الوصف 255 حرفًا.',
            'real_state_address.required' => 'حقل عنوان العقار مطلوب.',
            'real_state_address.max' => 'يجب ألا يتجاوز حقل عنوان العقار 255 حرفًا.',
            'owner_name.required' => 'حقل اسم المالك مطلوب.',
            'owner_name.max' => 'يجب ألا يتجاوز حقل اسم المالك 255 حرفًا.',
            'transaction_date.required' => 'حقل تاريخ العملية مطلوب.',
            'transaction_date.date' => 'يجب أن يكون حقل تاريخ العملية تاريخًا صحيحًا.',
            'transaction_date.date_format' => 'يجب أن يكون تنسيق حقل تاريخ العملية Y-m-d.',
        ];
    }

}

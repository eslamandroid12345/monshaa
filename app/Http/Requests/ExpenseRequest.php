<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'total_money' => 'required|numeric',
            'description' => 'required|max:255',
            'transaction_date' => 'required|date|date_format:Y-m-d'
        ];
    }


    public function messages(): array
    {
        return [
            'total_money.required' => 'المبلغ الإجمالي مطلوب.',
            'total_money.numeric' => 'يجب أن يكون المبلغ الإجمالي رقمًا.',
            'description.required' => 'الوصف مطلوب.',
            'description.max' => 'يجب ألا يتجاوز الوصف 255 حرفًا.',
            'transaction_date.required' => 'تاريخ المعاملة مطلوب.',
            'transaction_date.date' => 'يجب أن يكون تاريخ المعاملة تاريخًا صحيحًا.',
            'transaction_date.date_format' => 'يجب أن يكون تاريخ المعاملة بالصيغة التالية: YYYY-MM-DD.',
        ];
    }

    /*
     * Make validation messages for this validation by arabic language
     */
}

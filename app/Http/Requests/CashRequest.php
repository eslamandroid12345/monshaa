<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CashRequest extends FormRequest
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
            'total_amount' => 'required|numeric|min:1|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'transaction_date' => 'required|date|date_format:Y-m-d',
            'contract_date_from' => 'required|date|date_format:Y-m-d',
            'contract_date_to' => 'required|date|date_format:Y-m-d|after_or_equal:contract_date_from',
        ];
    }


    public function messages(): array
    {
        return [
            'total_amount.required' => 'المبلغ الإجمالي مطلوب.',
            'total_amount.numeric' => 'المبلغ الإجمالي يجب أن يكون رقمًا.',
            'total_amount.regex' => 'المبلغ الإجمالي كبير جدا.',
            'total_amount.min' => 'المبلغ الإجمالي يجب أن لا يكون أقل من 1.',
            'transaction_date.required' => 'تاريخ العملية مطلوب.',
            'transaction_date.date' => 'تاريخ العملية يجب أن يكون تاريخًا صالحًا.',
            'transaction_date.date_format' => 'تنسيق تاريخ العملية يجب أن يكون Y-m-d.',
            'contract_date_from.required' => 'تاريخ بداية العقد مطلوب.',
            'contract_date_from.date' => 'تاريخ بداية العقد يجب أن يكون تاريخًا صالحًا.',
            'contract_date_from.date_format' => 'تنسيق تاريخ بداية العقد يجب أن يكون Y-m-d.',
            'contract_date_to.required' => 'تاريخ نهاية العقد مطلوب.',
            'contract_date_to.date' => 'تاريخ نهاية العقد يجب أن يكون تاريخًا صالحًا.',
            'contract_date_to.date_format' => 'تنسيق تاريخ نهاية العقد يجب أن يكون Y-m-d.',
            'contract_date_to.after_or_equal' => 'تاريخ نهاية العقد يجب أن يكون بعد أو يساوي تاريخ بداية العقد.',
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            'total_amount' => 'required|numeric|min:0',
            'installment_number' => 'required|max:255',
            'commission_type' => 'required|in:per,val',
            'commission' => 'required|numeric|min:0',
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
            'total_amount.min' => 'المبلغ الإجمالي يجب أن لا يكون أقل من 0.',
            'installment_number.required' => 'رقم القسط مطلوب.',
            'installment_number.max' => 'رقم القسط يجب ألا يتجاوز 255 حرفًا.',
            'commission_type.required' => 'نوع العمولة مطلوب.',
            'commission_type.in' => 'نوع العمولة يجب أن يكون "per" أو "val".',
            'commission.required' => 'العمولة مطلوبة".',
            'commission.numeric' => 'العمولة يجب أن تكون رقمًا.',
            'commission.min' => 'العمولة يجب ألا تكون أقل من 0.',
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

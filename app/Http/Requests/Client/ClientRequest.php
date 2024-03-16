<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric',
            'code' => 'required',
            'department' => 'required|string|in:state_sale,state_rent,land_sale',
            'inspection_date' => 'nullable|date|date_format:Y-m-d',
            'notes' => 'nullable',
            'status' => 'nullable|in:waiting,inspection,inspection_accepted,inspection_refused',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.numeric' => 'يجب أن يكون حقل الهاتف قيمة رقمية.',
            'code.required' => 'حقل الكود مطلوب.',
            'department.required' => 'حقل القسم مطلوب.',
            'department.in' => 'قيمة حقل القسم غير صالحة.',
            'inspection_date.date' => 'يجب أن يكون حقل تاريخ المعاينه تاريخًا صحيحًا.',
            'inspection_date.date_format' => 'تنسيق تاريخ المعاينه غير صالح. يجب أن يكون بتنسيق: Y-m-d.',
            'status.in' => 'القيمة المدخلة في حقل الحالة غير صالحة.',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'image' => 'nullable|mimes:jpeg,png,jpg',
            'name' => 'required',
            'phone' => 'required|numeric|unique:employees,phone,' . $this->id,
            'password' => 'required|min:8',
            'address' => 'required',
            'card_number' => 'required|numeric',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم الموظف مطلوب',
            'name.max' => 'اسم الموظف يجب ان لا يتعدي 255 حرف',
            'address.required' => 'عنوان الموظف مطلوب',
            'address.max' => 'عنوان الموظف يجب ان لا يتعدي عن 255 حرف',
            'phone.required' => 'هاتف الموظف مطلوب',
            'phone.unique' => 'هذا الرقم مسجل لدينا من قبل',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم وليس شيء اخر',
            'card_number.required' => 'رقم البطاقه مطلوب',
            'card_number.numeric' => 'رقم البطاقه يجب ان يكون رقم',
            'card_number.max' => 'رقم البطاقه يجب ان لا يتعدي عن 17 رقم',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 8 احرف وارقام',

        ];
    }


    protected function failedValidation(Validator $validator)
    {

        return validationException($validator);
    }
}

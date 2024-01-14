<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'shop_name' => 'required|max:255',
            'shop_address' => 'required|max:255',
            'phone' => 'required|numeric|unique:users,phone',
            'tax_number' => 'nullable|numeric',
            'password' => 'required|min:8',
            'privacy_and_policy' => 'required|boolean',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم مالك الشركه او المكتب مطلوب',
            'name.max' => 'اسم مالك الشركه او المكتب يجب ان لا يتعدي 255 حرف',
            'shop_name.required' => 'اسم الشركه العقاريه مطلوب',
            'shop_name.max' => 'اسم الشركه العقاريه يجب ان لا يتعدي عن 255 حرف',
            'shop_address.required' => 'عنوان الشركه مطلوب',
            'shop_address.max' => 'عنوان الشركه يجب ان لا يتعدي عن 255 حرف',
            'phone.required' => 'هاتف صاحب الشركه العقاريه مطلوب',
            'phone.unique' => 'هذا الرقم مسجل لدينا من قبل',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم وليس شيء اخر',
            'tax_number.numeric' => 'الرقم الضريبي يجب ان يكون رقم',
            'tax_number.max' => 'الرقم الضريبي يجب ان لا يتعدي عن 255 حرف',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 8 احرف وارقام',
            'privacy_and_policy.required' => 'يجب الموافقه علي الشروط والسياسات لتسجيل الحساب معنا',
            'privacy_and_policy.boolean' => 'الموافقه علي الشروط والسياسات يجب ان تحتوي علي 0 او 1 وليس شيء اخر',
        ];
    }


    protected function failedValidation(Validator $validator)
    {

        return validationException($validator);
    }
}

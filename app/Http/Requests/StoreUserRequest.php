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
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_phone' => 'required|numeric|unique:companies,company_phone',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|min:8',
            'privacy_and_policy' => 'required|boolean',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم مالك الشركه او المكتب مطلوب',
            'name.max' => 'اسم مالك الشركه او المكتب يجب ان لا يتعدي 255 حرف',
            'company_name.required' => 'اسم الشركه العقاريه مطلوب',
            'company_name.max' => 'اسم الشركه العقاريه يجب ان لا يتعدي عن 255 حرف',
            'company_address.required' => 'عنوان الشركه مطلوب',
            'company_address.max' => 'عنوان الشركه يجب ان لا يتعدي عن 255 حرف',
            'company_phone.required' => 'رقم هاتف الشركه العقاريه او المكتب العقاري مطلوب',
            'phone.required' => 'هاتف صاحب الشركه العقاريه مطلوب',
            'company_phone.unique' => 'رقم الشركه العقاريه مسجل من قبل',
            'phone.unique' => 'رقم هاتف المدير مسجل لدينا من قبل',
            'company_phone.numeric' => 'هاتف الشركه يجب ان يكون رقم',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم وليس شيء اخر',
            'tax_number.numeric' => 'الرقم الضريبي يجب ان يكون رقم',
            'tax_number.max' => 'الرقم الضريبي يجب ان لا يتعدي عن 255 حرف',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 8 احرف وارقام',
            'privacy_and_policy.required' => 'يجب الموافقه علي الشروط والسياسات لتسجيل الحساب معنا',
            'privacy_and_policy.boolean' => 'الموافقه علي الشروط والسياسات يجب ان تحتوي علي 0 او 1 وليس شيء اخر',
        ];
    }

}

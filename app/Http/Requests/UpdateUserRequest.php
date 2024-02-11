<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'logo' => 'nullable|mimes:jpeg,png,jpg',
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',
            'company_phone' => 'required|numeric|unique:companies,company_phone,'. auth('user-api')->user()->company_id,
            'phone' => 'required|numeric|unique:users,phone,'. auth('user-api')->id(),
            'password' => 'nullable|min:8',
        ];
    }


    public function messages(): array
    {
        return [
            'logo.mimes' => 'لوجو المكتب العقاري او الشركه العقاريه يجب ان يدعم صيغه jpg,png,jpeg',
            'name.required' => 'اسم مالك الشركه او المكتب مطلوب',
            'name.max' => 'اسم مالك الشركه او المكتب يجب ان لا يتعدي 255 حرف',
            'company_name.required' => 'اسم الشركه العقاريه مطلوب',
            'company_name.max' => 'اسم الشركه العقاريه يجب ان لا يتعدي عن 255 حرف',
            'company_address.required' => 'عنوان الشركه مطلوب',
            'company_address.max' => 'عنوان الشركه يجب ان لا يتعدي عن 255 حرف',
            'phone.required' => 'هاتف صاحب الشركه العقاريه مطلوب',
            'phone.unique' => 'هذا الرقم مسجل لدينا من قبل',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم وليس شيء اخر',
            'company_phone.required' => 'هاتف  الشركه العقاريه مطلوب',
            'company_phone.unique' => 'رقم الشركه مسجل لدينا من قبل',
            'company_phone.numeric' => 'رقم هاتف الشركه يجب ان يكون رقم',
        ];
    }



}

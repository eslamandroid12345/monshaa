<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginUserRequest extends FormRequest
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
                'phone' => 'required|numeric',
                'password' => 'required',
                'token' => 'required',
                'device_type' => 'required|in:android,ios,web'
            ];

    }


    public function messages(): array
    {


            return [
                'phone.required' => 'رقم هاتف صاحب الشركه مطلوب للدخول',
                'phone.numeric'=> 'الهاتف يجب ان يكون رقم وليس شيء اخر',
                'password.required' => 'كلمه المرور مطلوبه',
                'token.required' => 'معرف الجهاز مطلوب اثناء الدخول',
                'device_type.required' => 'نوع معرف الجهاز مطلوب',
                'device_type.in' => 'نوع معرف الجهاز بجب ان يكون android,ios,web'

            ];
    }


}

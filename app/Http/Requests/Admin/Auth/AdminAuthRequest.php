<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthRequest extends FormRequest
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

            'email' => 'required',
            'password' => 'required'
        ];
    }


//    public function messages(): array
//    {
//        return [
//
//            'email.required' => 'البريد الالكتروني للدخول مطلوب',
//            'password.required' => 'كلمه مرور الدخول مطلوبه'
//        ];
//    }
}

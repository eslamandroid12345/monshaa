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

        if(request()->user_type == 'user'){
            return [
                'user_type' => 'required|in:user,employee',
                'phone' => 'required|numeric|exists:users,phone',
                'password' => 'required'
            ];

        }else{

            return [
                'user_type' => 'required|in:user,employee',
                'phone' => 'required|numeric|exists:employees,phone',
                'password' => 'required'

            ];
        }

    }


    public function messages(): array
    {

        if(request()->user_type == 'user') {

            return [

                'user_type.required' => 'نوع المستخدم مطلوب للدخول',
                'user_type.in' => 'نوع المستخدم يجب ان يكون user or employee للدخول',
                'phone.required' => 'رقم هاتف صاحب الشركه مطلوب للدخول',
                'phone.numeric'=> 'الهاتف يجب ان يكون رقم وليس شيء اخر',
                'phone.exists' => 'هذا الرقم غير مسجل لدينا',
                'password.required' => 'كلمه المرور مطلوبه',


            ];


        }else{

            return [
                'user_type.required' => 'نوع المستخدم مطلوب للدخول',
                'user_type.in' => 'نوع المستخدم يجب ان يكون user or employee للدخول',
                'phone.required' => 'رقم هاتف الموظف مطلوب',
                'phone.numeric'=> 'الهاتف يجب ان يكون رقم وليس شيء اخر',
                'phone.exists' => 'هذا الرقم غير مسجل لدينا',
                'password.required' => 'كلمه المرور مطلوبه',

            ];

        }

    }

    protected function failedValidation(Validator $validator)
    {

        return validationException($validator);
    }
}

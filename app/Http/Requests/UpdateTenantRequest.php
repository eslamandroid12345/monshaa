<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
{



    public function rules(): array
    {

        $userId = auth('user-api')->user()->company_id;

        return [

            'name' => 'required|max:255',
            'phone' => [
                'required',
                'numeric',
                 Rule::unique('tenants', 'phone')->ignore($userId, 'company_id'),
            ],
            'card_number' => [
                'required',
                'numeric',
                Rule::unique('tenants', 'card_number')->ignore($userId, 'company_id'),
            ],
            'card_address' => 'required|max:255',
            'job_title' => 'required|max:255',
            'nationality' => 'required|max:255',

        ];
    }


    public function messages(): array
    {
        return [

            'name.required' => 'اسم المستاجر مطلوب',
            'name.max' => 'عدد حروف اسم المستاجر يجب ان لا تتعدي عن 255 حرف',
            'phone.required' => 'هاتف المستاجر مطلوب',
            'phone.unique' => 'هذا الهاتف مسجل لدينا من قبل',
            'phone.numeric' => 'هاتف المستاجر يحب ان يكون رقم',
            'card_number.required' => 'رقم بطاقه المستاجر مطلوبه',
            'card_number.numeric' => 'رقم بطاقه المستاجر يجب ان تكون رقم',
            'card_address.required' => 'عنوان المستاجر المسجل بالبطاقه مطلوب',
            'card_address.max' => 'عنوان المستاجر المسجل بالبطاقه يجب ان لا يتعدي عن 255 حرف',
            'job_title.required' => 'ما هي وظيفه المستاجر',
            'job_title.max' => 'وظيفه المستاجر يجب ان لا تتعدي عن 255 حرف',
            'nationality.required' => 'جنسيه المستاجر مطلوبه',
            'nationality.max' => 'عدد احرف جنسيه المستاجر يجب ان لا تتعدي عن 255 حرف',

        ];
    }
}

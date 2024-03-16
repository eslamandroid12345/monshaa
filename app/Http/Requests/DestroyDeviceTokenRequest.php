<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyDeviceTokenRequest extends FormRequest
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

            'token' => 'required|exists:fcm_tokens,token'
        ];
    }


    public function messages(): array
    {
        return [

            'token.required' => 'معرف الجهاز مطلوب اثناء عمليه الخروج',
            'token.exists' => 'هذا المعرف غير صالح',
        ];
    }
}

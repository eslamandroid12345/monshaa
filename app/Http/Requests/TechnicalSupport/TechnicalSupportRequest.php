<?php

namespace App\Http\Requests\TechnicalSupport;

use Illuminate\Foundation\Http\FormRequest;

class TechnicalSupportRequest extends FormRequest
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
            'subject' => 'required',
            'message' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'subject.required' => 'موضوع الرساله مطلوب',
            'message.required' => 'الرساله الذي تريد ارسالها لشركه التطبيق مطلوبه',
        ];
    }
}

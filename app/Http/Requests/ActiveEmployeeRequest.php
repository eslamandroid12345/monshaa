<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ActiveEmployeeRequest extends FormRequest
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
            'is_active' => 'required|boolean',
            'block_reason' => 'nullable',
        ];
    }


    public function messages(): array
    {
        return [
            'is_active.required' => 'حقل تعديل الحاله مطلوب',
            'status.in' => 'حقل تعديل حاله الموظف يجب ان يكون active or not_active',

        ];
    }


}

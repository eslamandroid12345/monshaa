<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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

            'add_new_package' => 'nullable',
            'is_package' => 'nullable',
            'is_active' => 'required_with:add_new_package,is_package',
        ];
    }

  public function messages(): array
  {

      return [

          'number_of_employees.integer' => 'حقل عدد موظفين الشركه يجب ان يحتوي علي رقم وليس شئ اخر',
          'is_active.required_with' => 'يجب تفعيل الشركه في حاله اختيار الباقه السنويه او تجديد باقه الاشتراك',

      ];
  }
}

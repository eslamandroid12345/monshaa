<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'employee_image' => 'nullable|mimes:jpeg,png,jpg',
            'name' => 'required',
            'job_title' => 'required|max:255',
            'phone' => 'required|numeric|unique:users,phone, '. $this->id,
            'password' => 'required|min:8',
            'employee_address' => 'required',
            'card_number' => 'required|numeric',
            'is_active' => 'nullable|boolean',
            'employee_permissions' => 'required|array|in:states,lands,employees,expenses,tenants,tenant_contracts,financial_receipt,financial_cash,technical_support,expired_contracts,revenues,profits,tenant_states,selling_states,profits,revenue,clients,employee_commission,owner_phone_hidden,client_phone_hidden',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'اسم الموظف مطلوب',
            'name.max' => 'اسم الموظف يجب ان لا يتعدي 255 حرف',
            'job_title.required' => 'المسمي الوظيفي للموظف مطلوب',
            'job_title.max' => 'المسمي الوظيفي يجب ان لا يتعدي 255 حرف',
            'employee_address.required' => 'عنوان الموظف مطلوب',
            'phone.required' => 'هاتف الموظف مطلوب',
            'phone.unique' => 'هذا الرقم مسجل لدينا من قبل',
            'phone.numeric' => 'الهاتف يجب ان يكون رقم وليس شيء اخر',
            'card_number.required' => 'رقم البطاقه مطلوب',
            'card_number.numeric' => 'رقم البطاقه يجب ان يكون رقم',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 8 احرف وارقام',
            'employee_image.mimes' => 'الصوره يحب ان تكون jpeg,png,jpg',
            'is_active.boolean' => 'حقل تفعيل الموظف يجب ان يحتوي علي 0 او 1 وليس شئ اخر',
            'employee_permissions.required' => 'يرجي ادخال صلاحيات للموظف',
            'employee_permissions.array' => 'صلاحيات الموظف يجب ان تكون مصفوفه',
            'employee_permissions.in' => 'states,lands,employees,expenses,tenants,tenant_contracts,financial_receipt,financial_cash,technical_support,revenues,profits,tenant_stats,selling_states,profits,revenue,clients,employee_commission,owner_phone_hidden,client_phone_hidden صلاحيات الموظف يجب ان تحتوي علي هذه الشاشات ',

        ];
    }



}

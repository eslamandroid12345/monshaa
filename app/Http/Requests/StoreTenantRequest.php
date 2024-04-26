<?php

namespace App\Http\Requests;

use App\Rules\UniqueTenantData;
use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
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

            'name' => 'required|max:255',
            'phone' => ['required', 'numeric', new UniqueTenantData(request('tenant_id'), 'phone')],
            'card_number' => ['required', 'numeric',new UniqueTenantData(request('tenant_id'), 'card_number')],
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
            'phone.unique' => 'رقم هاتف المستاجر مسجل لدينا من قبل',
            'phone.numeric' => 'هاتف المستاجر يحب ان يكون رقم',
            'card_number.required' => 'رقم بطاقه المستاجر مطلوبه',
            'card_number.unique' => 'رقم بطاقه المستاجر مسجله من قبل',
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

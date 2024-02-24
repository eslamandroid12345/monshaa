<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantContractRequest extends FormRequest
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
            'owner_name' => 'required|max:255',
            'owner_phone' => 'required|max:255',
            'owner_card_number' => 'required|max:255',
            'owner_card_address' => 'required|max:255',
            'owner_job_title' => 'required|max:255',
            'owner_nationality' => 'required|max:255',
            'real_state_address' => 'required|max:255',
            'governorate' => 'required|max:255',
            'real_state_type' => 'required|in:furnished_apartment,empty_apartment,furnished_villa,empty_villa,shop',
            'real_state_space' => 'required|numeric',
            'real_state_address_details' => 'required|max:255',
            'building_number' => 'required',
            'apartment_number' => 'required',
            'contract_date' => 'required|date|date_format:Y-m-d',
            'contract_date_from' => 'required|date|date_format:Y-m-d',
            'contract_date_to' => 'required|date|date_format:Y-m-d',
            'contract_total' => 'required|numeric',
            'commission_type' => 'required|in:per,val',
            'commission' => 'required|numeric',
            'insurance_total' => 'required|numeric',
            'period_of_delay' => 'nullable|numeric',
        ];
    }


    public function messages(): array
    {
        return [

            'owner_name.required' => 'اسم المالك مطلوب ولا يمكن أن يكون فارغًا.',
            'owner_name.max' => 'يجب ألا يزيد اسم المالك عن 255 حرفًا.',
            'owner_phone.required' => 'رقم هاتف المالك مطلوب ولا يمكن أن يكون فارغًا.',
            'owner_phone.max' => 'يجب ألا يزيد رقم هاتف المالك عن 255 حرفًا.',
            'owner_card_number.required' => 'رقم بطاقة المالك مطلوب ولا يمكن أن يكون فارغًا.',
            'owner_card_number.max' => 'يجب ألا يزيد رقم بطاقة المالك عن 255 حرفًا.',
            'owner_card_address.required' => 'عنوان بطاقة المالك مطلوب ولا يمكن أن يكون فارغًا.',
            'owner_card_address.max' => 'يجب ألا يزيد عنوان بطاقة المالك عن 255 حرفًا.',
            'owner_job_title.required' => 'المسمى الوظيفي للمالك مطلوب ولا يمكن أن يكون فارغًا.',
            'owner_job_title.max' => 'يجب ألا يزيد المسمى الوظيفي للمالك عن 255 حرفًا.',
            'owner_nationality.required' => 'الجنسية للمالك مطلوبة ولا يمكن أن تكون فارغة.',
            'owner_nationality.max' => 'يجب ألا تزيد الجنسية للمالك عن 255 حرفًا.',
            'real_state_address.required' => 'عنوان العقار مطلوب ولا يمكن أن يكون فارغًا.',
            'real_state_address.max' => 'يجب ألا يزيد عنوان العقار عن 255 حرفًا.',
            'governorate.required' => 'المحافظة مطلوبة ولا يمكن أن تكون فارغة.',
            'governorate.max' => 'يجب ألا تزيد المحافظة عن 255 حرفًا.',
            'real_state_type.required' => 'نوع العقار مطلوب ويجب أن يكون من بين أنواع العقار المتاحة.',
            'real_state_type.in' => 'النوع المحدد للعقار غير صالح.',
            'real_state_space.required' => 'مساحة العقار مطلوبة ويجب أن تكون قيمة رقمية.',
            'real_state_space.numeric' => 'مساحة العقار يجب أن تكون قيمة رقمية.',
            'real_state_address_details.required' => 'تفاصيل عنوان العقار بالتفصيل مطلوبة.',
            'real_state_address_details.max' => 'يجب ألا يزيد عنوان العقار بالتفصيل  عن 255 حرفًا.',
            'building_number.required' => 'رقم المبنى مطلوب.',
            'apartment_number.required' => 'رقم الشقة مطلوب.',
            'contract_date.required' => 'تاريخ العقد مطلوب ويجب أن يكون بالتنسيق Y-m-d.',
            'contract_date.date' => 'تاريخ العقد يجب أن يكون تاريخًا صالحًا.',
            'contract_date.date_format' => 'تنسيق تاريخ العقد يجب أن يكون Y-m-d.',
            'contract_date_from.required' => 'تاريخ بداية العقد مطلوب ويجب أن يكون بالتنسيق Y-m-d.',
            'contract_date_from.date' => 'تاريخ بداية العقد يجب أن يكون تاريخًا صالحًا.',
            'contract_date_from.date_format' => 'تنسيق تاريخ بداية العقد يجب أن يكون Y-m-d.',
            'contract_date_to.required' => 'تاريخ نهاية العقد مطلوب ويجب أن يكون بالتنسيق Y-m-d.',
            'contract_date_to.date' => 'تاريخ نهاية العقد يجب أن يكون تاريخًا صالحًا.',
            'contract_date_to.date_format' => 'تنسيق تاريخ نهاية العقد يجب أن يكون Y-m-d.',
            'contract_total.required' => 'إجمالي العقد مطلوب ويجب أن يكون رقمًا.',
            'contract_total.numeric' => 'إجمالي العقد يجب أن يكون رقمًا.',
            'commission_type.required' => 'نوع العمولة مطلوب ويجب أن يكون من بين الأنواع المتاحة.',
            'commission_type.in' => 'النوع المحدد للعمولة غير صالح.',
            'commission.required' => 'العمولة مطلوبة ويجب أن تكون رقمًا.',
            'commission.numeric' => 'العمولة يجب أن تكون رقمًا.',
            'insurance_total.required' => 'إجمالي التأمين مطلوب ويجب أن يكون رقمًا.',
            'insurance_total.numeric' => 'إجمالي التأمين يجب أن يكون رقمًا.',
            'period_of_delay.numeric' => 'فترة التأخير يجب أن تكون قيمة رقمية.',
        ];
    }

}

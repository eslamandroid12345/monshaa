<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class LandRequest extends FormRequest
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
            'address' => 'required',
            'address_details' => 'required',
            'seller_name' => 'required',
            'size_in_metres' => 'required|numeric',
            'price_of_one_meter' => 'required|numeric|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'total_cost' => 'required|numeric|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'seller_phone_number' =>  'required|numeric',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertise_details' => 'nullable|max:20000',
            'land_date_register' => 'required|date|date_format:Y-m-d',
        ];
    }


    public function messages(): array
    {
        return [
            'address.required' => 'العنوان مطلوب.',
            'address_details.required' => 'تفاصيل العنوان مطلوبة.',
            'seller_name.required' => 'اسم البائع مطلوب.',
            'size_in_metres.required' => 'حجم الأرض بالأمتار مطلوب.',
            'size_in_metres.numeric' => 'يجب أن يكون حجم الأرض بالأمتار رقمًا.',
            'price_of_one_meter.required' => 'سعر المتر الواحد مطلوب.',
            'price_of_one_meter.numeric' => 'يجب أن يكون سعر المتر الواحد رقمًا.',
            'price_of_one_meter.regex' => 'سعر المتر الواحد كبير جدا.',
            'total_cost.required' => 'التكلفة الإجمالية مطلوبة.',
            'total_cost.numeric' => 'يجب أن تكون التكلفة الإجمالية رقمًا.',
            'total_cost.regex' => 'التكلفة الإجمالية رقم كبير جدا.',
            'seller_phone_number.required' => 'رقم هاتف البائع مطلوب.',
            'seller_phone_number.numeric' => 'يجب أن يكون رقم هاتف البائع رقمًا.',
            'advertiser_type.required' => 'نوع الجهة المعلنة مطلوب.',
            'advertiser_type.in' => 'يجب أن يكون نوع الجهة المعلنة صاحب عقار أو شركة عقارات.',
            'advertise_details.max' => 'يجب ألا تتجاوز تفاصيل الإعلان 20000 حرف.',
            'land_date_register.required' => 'تاريخ تسجيل الأرض مطلوب.',
            'land_date_register.date' => 'يجب أن يكون تاريخ تسجيل الأرض تاريخًا صحيحًا.',
            'land_date_register.date_format' => 'يجب أن يكون تاريخ تسجيل الأرض بالصيغة التالية: YYYY-MM-DD.',
        ];
    }
}

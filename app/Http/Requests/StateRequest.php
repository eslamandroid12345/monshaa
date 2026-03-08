<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
{
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
            'compound_name' => 'nullable',
            'building_number' => 'nullable',
            'apartment_number' => 'nullable',
            'real_state_address' => 'nullable|max:255',
            'real_state_address_details' => 'required',
            'real_state_type' => 'required|in:furnished_apartment,empty_apartment,furnished_villa,empty_villa,shop,empty_office,furnished_office',
            'department' => 'required|in:rent,sale',
            'advertiser_name' => 'required|max:255',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertised_phone_number' => 'required|numeric',
            'real_state_space' => 'required|numeric',
            'real_state_price' => 'required|numeric|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'number_of_bathrooms' => 'nullable|integer',
            'number_of_rooms' => 'nullable|integer',
            'advertise_details' => 'nullable|max:20000',
            'state_date_register' => 'required|date|date_format:Y-m-d',
            'status' => 'nullable|in:waiting,rent,sale',
        ];
    }


    public function messages(): array
    {
        return [
            'real_state_address.max' => 'عنوان العقار يجب ان لا يتعدي عن 255 حرف.',
            'real_state_address_details.required' => 'يرجى إدخال تفاصيل عنوان العقار.',
            'real_state_type.required' => 'يرجى اختيار نوع العقار.',
            'real_state_type.in' => 'نوع العقار غير صحيح. يرجى اختيار قيمة صحيحة من القائمة.',
            'department.required' => 'يرجى اختيار القسم.',
            'department.in' => 'القسم غير صحيح. يرجى اختيار (إيجار) أو (بيع).',
            'advertiser_type.required' => 'يرجى اختيار نوع المعلن.',
            'advertiser_type.in' => 'نوع المعلن غير صحيح. يرجى اختيار قيمة صحيحة من القائمة.',
            'advertiser_name.required' => 'يرجى إدخال اسم المعلن.',
            'advertiser_name.max' => 'اسم المعلن يجب ألا يتجاوز 255 حرفًا.',
            'advertised_phone_number.required' => 'يرجى إدخال رقم هاتف المعلن.',
            'advertised_phone_number.numeric' => 'رقم هاتف المعلن يجب أن يكون أرقامًا فقط.',
            'real_state_space.required' => 'يرجى إدخال مساحة العقار.',
            'real_state_space.numeric' => 'مساحة العقار يجب أن تكون رقمًا.',
            'real_state_price.required' => 'يرجى إدخال سعر العقار.',
            'real_state_price.numeric' => 'سعر العقار يجب أن يكون رقمًا.',
            'real_state_price.regex' => 'صيغة سعر العقار غير صحيحة. (حتى 15 رقمًا وبحد أقصى رقمين بعد العلامة العشرية).',
            'number_of_rooms.integer' => 'عدد الغرف يجب أن يكون رقمًا صحيحًا.',
            'number_of_bathrooms.integer' => 'عدد الحمامات يجب أن يكون رقمًا صحيحًا.',
            'advertise_details.max' => 'تفاصيل العقار يجب ألا تتجاوز 20000 حرف.',
            'state_date_register.required' => 'يرجى إدخال تاريخ تسجيل العقار.',
            'state_date_register.date' => 'يرجى إدخال تاريخ صحيح.',
            'state_date_register.date_format' => 'صيغة التاريخ يجب أن تكون (YYYY-MM-DD).',
            'status.in' => 'حاله العقار غير صالحه!',
        ];
    }

    public function attributes(): array
    {
        return [
            'compound_name' => 'اسم المجمع السكني',
            'building_number' => 'رقم العمارة',
            'apartment_number' => 'رقم الشقة',
            'real_state_address' => 'عنوان العقار',
            'real_state_address_details' => 'تفاصيل عنوان العقار',
            'real_state_type' => 'نوع العقار',
            'department' => 'القسم',
            'advertiser_name' => 'اسم المعلن',
            'advertiser_type' => 'نوع المعلن',
            'advertised_phone_number' => 'رقم هاتف المعلن',
            'real_state_space' => 'مساحة العقار',
            'real_state_price' => 'سعر العقار',
            'number_of_bathrooms' => 'عدد الحمامات',
            'number_of_rooms' => 'عدد الغرف',
            'advertise_details' => 'تفاصيل العقار',
            'state_date_register' => 'تاريخ تسجيل العقار',
            'status' => 'حاله العقار',
        ];
    }

}

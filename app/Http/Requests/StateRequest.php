<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
            'building_number' => 'nullable',
            'apartment_number' => 'nullable',
            'real_state_address' => 'required',
            'real_state_address_details' => 'required',
            'real_state_type' => 'required|in:furnished_apartment,empty_apartment,furnished_villa,empty_villa,shop',
            'department' => 'required|in:rent,sale',
            'advertiser_name' => 'required|max:255',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertised_phone_number' => 'required|numeric',
            'real_state_space' => 'required|numeric',
            'real_state_price' => 'required|numeric|regex:/^\d{1,15}(\.\d{1,2})?$/',
            'number_of_bathrooms' => 'nullable|integer',
            'number_of_rooms' => 'required|integer',
            'advertise_details' => 'nullable|max:20000',
            'state_date_register' => 'required|date|date_format:Y-m-d',
        ];
    }


    public function messages(): array
    {
        return [
            'real_state_address.required' => 'عنوان العقار مطلوب',
            'real_state_address_details' => 'عنوان العقار تفصيلي مطلوب',
            'real_state_type.required' => 'نوع العقار مطلوب',
            'real_state_type.in' => 'نوع العقار يجب ان يكون شقه مفروشه او شقه فارغه او فيلا مفروشه او فيلا فارغه او محل',
            'department.required' => 'العقار تابع لانهي قسم مثال (ايجار - بيع)',
            'department.in' => 'القسم يجب ان يكون ايجار او بيع وليس شئ اخر',
            'advertiser_type.required' => 'نوع المعلن مطلوب',
            'advertiser_type.in' => 'نوع المعلن يجب ان يكون صاحب مالك عقار او صاحب شركه عقاريه',
            'advertised_phone_number.required' => 'رقم هاتف المعلن مطلوب',
            'advertised_phone_number.in' => 'رقم هاتف المعلن يجب ان يكون رقم',
            'real_state_space.required' => 'مساحه العقار بالمتر مطلوبه',
            'real_state_space.numeric' => 'مساحه العقار يجب ان تكون رقم',
            'real_state_price.required' => 'سعر العقار مطلوب',
            'real_state_price.in' => 'سعر العقار يحب ان يكون رقم وليس شئ اخر',
            'real_state_price.regex' => 'سعر العقار كبير جدا',
            'number_of_bathrooms.integer' => 'عدد الحمامات يجب ان يكون رقم',
            'number_of_rooms.required' => 'عدد الغرف مطلوب',
            'number_of_rooms.integer' => 'عدد الغرف يجب ان يكون رقم',
            'advertise_details' => 'تفاصيل الاعلان (عدد الاحرف القصوي 20000)',
            'state_date_register.required' => 'تاريخ تسجيل العقار مطلوب',
            'state_date_register.date' => 'تاريخ تسجيل العقار يجب ان يكون تاريخ',
            'state_date_register.date_format' => 'تاريخ تسجبل العقار يجب ان يكون Y-m-d',

        ];
    }


}

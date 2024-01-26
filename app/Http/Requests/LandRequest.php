<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
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
            'land_images' => 'nullable',
            'land_images.*' => 'image|mimes:jpeg,png,jpg,webp',
            'address' => 'required',
            'seller_name' => 'required',
            'size_in_metres' => 'required|numeric',
            'price_of_one_meter' => 'required|numeric',
            'total_cost' => 'required|numeric',
            'seller_phone_number' =>  'required|numeric',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertise_details' => 'nullable|max:20000',
            'land_date_register' => 'required|date|date_format:Y-m-d',
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        return validationException($validator);
    }
}

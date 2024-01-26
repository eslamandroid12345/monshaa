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
            'real_state_images' => 'nullable',
            'real_state_images.*' => 'image|mimes:jpeg,png,jpg',
            'building_number' => 'nullable',
            'apartment_number' => 'nullable',
            'real_state_address' => 'required',
            'real_state_address_details' => 'required',
            'real_state_type' => 'required|in:apartment,villa,shop',
            'department' => 'required|in:rent,sale',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertised_phone_number' => 'required|numeric',
            'real_state_space' => 'required|numeric',
            'real_state_price' => 'required|numeric',
            'number_of_bathrooms' => 'nullable|integer',
            'number_of_rooms' => 'required|integer',
            'advertise_details' => 'nullable|max:20000',
            'state_date_register' => 'required|date|date_format:Y-m-d',

        ];
    }

    protected function failedValidation(Validator $validator)
    {

        return validationException($validator);
    }

}

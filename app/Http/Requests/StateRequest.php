<?php

namespace App\Http\Requests;

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
            'real_state_images' => 'nullable|array',
            'real_state_images.*' => 'image|mimes:jpeg,png,jpg',
            'building_number' => 'nullable',
            'apartment_number' => 'nullable',
            'real_state_address' => 'required',
            'real_state_address_details' => 'required',
            'real_state_type' => 'required|in:apartment,villa,shop',
            'department' => 'required|in:rent,sale',
            'advertiser_type' => 'required|in:real_state_owner,real_state_company',
            'advertised_phone_number' => 'required|numeric',
            'real_state_space' => 'required|integer',
            'real_state_price' => 'required|numeric',
            'number_of_bathrooms' => 'nullable|integer',
        ];
    }

}

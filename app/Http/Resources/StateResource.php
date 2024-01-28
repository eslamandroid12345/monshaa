<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id'  => $this->id,
            'status' => $this->status,
            'real_state_images' => $this->getAllImages(),
            'building_number' => $this->building_number,
            'apartment_number' => $this->apartment_number,
            'real_state_address' => $this->real_state_address,
            'real_state_address_details' => $this->real_state_address_details,
            'real_state_type' => $this->real_state_type,
            'department' => $this->department,
            'advertiser_type' => $this->advertiser_type,
            'advertised_phone_number' => $this->advertised_phone_number,
            'real_state_space' => $this->real_state_space,
            'real_state_price' =>$this->real_state_price,
            'number_of_bathrooms' => $this->number_of_bathrooms,
            'number_of_rooms' => $this->number_of_rooms,
            'advertise_details' => $this->advertise_details,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];

    }


    private function getAllImages(): array
    {

        $imageUrls = [];
        foreach (json_decode($this->real_state_images,true) as $path) {
            $imageUrls[] = asset($path); // Assuming images are stored in the public directory
        }

        return $imageUrls;
    }
}

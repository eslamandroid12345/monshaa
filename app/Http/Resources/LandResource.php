<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LandResource extends JsonResource
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
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'phone' => $this->user->phone,
            ],
            'land_images' => $this->land_images,
            'address' => $this->address,
            'address_details' => $this->address_details,
            'seller_name' => $this->seller_name,
            'size_in_metres' => $this->size_in_metres,
            'price_of_one_meter' => $this->price_of_one_meter,
            'total_cost' => $this->total_cost,
            'seller_phone_number' => $this->seller_phone_number,
            'advertiser_type' => $this->advertiser_type,
            'advertise_details' => $this->advertise_details,
            'status' => $this->status,
            'created_at' => $this->land_date_register,
            'updated_at' => $this->updated_at->format('Y-m-d')

        ];
    }


}

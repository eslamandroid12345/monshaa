<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'logo' => $this->logo != null ? asset($this->logo) : null,
            'name' => $this->name,
            'user_type' => 'manger',
            'shop_name' => $this->shop_name,
            'shop_address' => $this->shop_address,
            'phone' => $this->phone,
            'tax_number' => $this->tax_number,
            'status' => $this->status,
            'token' => 'Bearer '.$this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')

        ];
    }
}

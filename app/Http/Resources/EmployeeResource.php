<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'logo' => $this->user->logo != null ? asset($this->user->logo) : null,
            'name' => $this->name,
            'user_type' => 'employee',
            'shop_name' => $this->user->shop_name,
            'shop_address' => $this->user->shop_address,
            'phone' => $this->phone,
            'tax_number' => $this->user->tax_number,
            'status' => $this->status,
            'token' => 'Bearer '.$this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];
    }
}

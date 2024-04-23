<?php

namespace App\Http\Resources\Revenue;

use Illuminate\Http\Resources\Json\JsonResource;

class RevenueResource extends JsonResource
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
            'real_state_address' => $this->real_state_address,
            'tenant_name' => $this->tenant_name,
            'owner_name' => $this->owner_name,
            'total_money' => $this->total_money,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'phone' => $this->user->phone,
            ],
            'description' => $this->description,
            'transaction_date' => $this->transaction_date,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];
    }
}

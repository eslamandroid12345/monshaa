<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeGetDataResource extends JsonResource
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
            'logo' => $this->company->logo != null ? asset($this->company->logo) : null,
            'name' => $this->name,
            'address' => $this->employee_address,
            'phone' => $this->phone,
            'card_number' => $this->card_number,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];
    }
}

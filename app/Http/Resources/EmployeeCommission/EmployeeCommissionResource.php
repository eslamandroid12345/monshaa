<?php

namespace App\Http\Resources\EmployeeCommission;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeCommissionResource extends JsonResource
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
            ],
            'employee' => [
                'id' => $this->employee->id,
                'name' => $this->employee->name,
            ],

            'total_money' => $this->total_money,
            'description' => $this->description,
            'real_state_address' => $this->real_state_address,
            'tenant_name' => $this->tenant_name,
            'owner_name' => $this->owner_name,
            'transaction_date' => $this->transaction_date,
        ];
    }
}

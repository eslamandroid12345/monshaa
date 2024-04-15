<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceiptResource extends JsonResource
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
                'name' => $this->user->name,
                'phone' => $this->user->phone,
            ],

            'owner' => [
                'name' => $this->tenant_contract->owner_name,
                'phone' => $this->tenant_contract->owner_phone,
                'card_number' => $this->tenant_contract->owner_card_number,
                'address' => $this->tenant_contract->owner_card_address,
                'job_title' => $this->tenant_contract->owner_job_title,
                'nationality' => $this->tenant_contract->owner_nationality,
            ],

            'state' => [
                'real_state_type' => $this->tenant_contract->real_state_type,
                'space' => $this->tenant_contract->real_state_space,
                'address_details' => $this->tenant_contract->real_state_address,
                'building_number' => $this->tenant_contract->building_number,
                'apartment_number' => $this->tenant_contract->apartment_number,
                'contract_total' => $this->tenant_contract->contract_total,
                'insurance_total' => $this->tenant_contract->insurance_total,
            ],
            'owner_name' => $this->tenant_contract->owner_name,
            'owner_phone' => $this->tenant_contract->owner_phone,
            'total_amount' => $this->total_amount,
            'commission' => $this->commission,
            'transaction_date' => $this->transaction_date,
            'contract_date_from' => $this->contract_date_from,
            'contract_date_to' => $this->contract_date_to,

        ];
    }
}

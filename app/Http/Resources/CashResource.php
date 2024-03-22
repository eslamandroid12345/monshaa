<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CashResource extends JsonResource
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
            'tenant_name' => $this->tenant_contract->tenant->name,
            'tenant_phone' => $this->tenant_contract->tenant->phone,
            'total_amount' => $this->total_amount,
            'transaction_date' => $this->transaction_date,
            'contract_date_from' => $this->contract_date_from,
            'contract_date_to' => $this->contract_date_to,
        ];
    }
}

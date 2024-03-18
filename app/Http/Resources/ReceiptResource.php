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

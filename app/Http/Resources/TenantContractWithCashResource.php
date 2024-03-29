<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantContractWithCashResource extends JsonResource
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
            'tenant' => $this->tenant->name,
            'owner_name' => $this->owner_name,
            'real_state_address' => $this->real_state_address,
            'contract_total' => $this->contract_total,
            'receipts' => CashResource::collection($this->cashes)
        ];
    }
}

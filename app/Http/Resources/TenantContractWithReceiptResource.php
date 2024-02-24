<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantContractWithReceiptResource extends JsonResource
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
            'contract_total' => $this->contract_total,
            'receipts' => ReceiptResource::collection($this->receipts)
        ];
    }
}

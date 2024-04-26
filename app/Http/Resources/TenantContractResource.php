<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantContractResource extends JsonResource
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
            'day' => $this->contract_day,
            'tenant' => new TenantResource($this->tenant),
            'owner_name' => $this->owner_name,
            'owner_phone' => $this->owner_phone,
            'owner_card_number' => $this->owner_card_number,
            'owner_card_address' => $this->owner_card_address,
            'owner_job_title' => $this->owner_job_title,
            'owner_nationality' => $this->owner_nationality,
            'real_state_address' => $this->real_state_address,
            'governorate' => $this->governorate,
            'real_state_type' => $this->real_state_type,
            'real_state_space' => $this->real_state_space,
            'real_state_address_details' => $this->real_state_address_details,
            'building_number' => $this->building_number,
            'apartment_number' => $this->apartment_number,
            'contract_date' => $this->contract_date,
            'contract_date_from' => $this->contract_date_from,
            'contract_date_to' => $this->contract_date_to,
            'contract_total' => $this->contract_total,
            'commission_type' => $this->commission_type,
            'commission' => $this->commission,
            'insurance_total' => $this->insurance_total,
            'period_of_delay' => $this->period_of_delay,
            'cash_type' => $this->cash_type_text,
            'cash_money_type' => $this->cash_type,
        ];
    }
}

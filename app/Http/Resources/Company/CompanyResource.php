<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'logo' => $this->logo,
            'name' => $this->company_name,
            'address' => $this->company_address,
            'phone' => $this->company_phone,
            'date_start_subscription' => $this->date_start_subscription,
            'date_end_subscription' => $this->date_end_subscription,
            'status' => $this->status,
            'number_of_employees' => $this->number_of_employees,
            'currency' => $this->currency,
            'account_type' => $this->account_type,
            'is_active' => $this->is_active,
            'is_package' => $this->is_package,


        ];
    }
}

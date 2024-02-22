<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'logo' => $this->company->logo,
            'name' => $this->name,
            'job_title' => 'Manger Of Company',
            'currency' => $this->company->currency,
            'user_type' => 'manger',
            'permissions' => [
                "home_page",
                "states",
                "lands",
                "tenants",
                "tenant_contracts",
                "financial_receipt",
                "financial_cash",
                "expenses",
                "employees",
                "reports",
                "notifications",
                "setting",
                "technical_support",
                "expired_contracts",
                "revenues",
                "profits",
                "tenant_stats",
                "selling_states"
            ],
            'company_name' => $this->company->company_name,
            'company_address' => $this->company->company_address,
            'company_phone' => $this->company->company_phone,
            'phone' => $this->phone,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
            'token' => 'Bearer '.$this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')

        ];

    }



}

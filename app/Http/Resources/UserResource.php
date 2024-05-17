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
            'job_title' => 'admin',
            'currency' => $this->company->currency,
            'permissions' => $this->getAllPermissions(),
            'user_type' => 'manager',
            'company_name' => $this->company->company_name,
            'company_address' => $this->company->company_address,
            'company_phone' => $this->company->company_phone,
            'phone' => $this->phone,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
            'token' => 'Bearer '.$this->token,
             'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
            ];

    }


    private function getAllPermissions(): array
    {

        return [
            "home_page",
            "states",
            "selling_states",
            "tenant_states",
            "lands",
            "tenants",
            "tenant_contracts",
            "financial_receipt",
            "financial_cash",
            "expenses",
            "employees",
            "notifications",
            "technical_support",
            "expired_contracts",
            "profits",
            "revenue",
            "clients",
            "setting",
            "employee_commission",
            "owner_phone_hidden",
            "client_phone_hidden"
        ];


    }



}

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
            'company_name' => $this->company->company_name,
            'company_address' => $this->company->company_address,
            'company_phone' => $this->company->company_phone,
            'phone' => $this->phone,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
            'token' => 'Bearer '.$this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
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
                "technical_support",
                "expired_contracts",
                "revenues",
                "profits",
                "tenant_stats",
                "selling_states",
                "setting",
            ],
            'home' => [

                [
                  'key' => 'states',
                  'name' => 'العقارات',
                  'icon' => asset('icons/states.png'),
                  'count' => 30,
                ],

                [
                    'key' => 'lands',
                    'name' => 'الاراضي',
                    'icon' => asset('icons/lands.png'),
                    'count' => 10,
                ],

                [
                    'key' => 'tenants',
                    'name' => 'المستاجرين',
                    'icon' => asset('icons/tenants.png'),
                    'count' => 4,
                ],

                [
                    'key' => 'tenant_contracts',
                    'name' => 'عقود الايجار',
                    'icon' => asset('icons/tenant_contracts.png'),
                    'count' => 2,
                ],

                [
                    'key' => 'financial_receipt',
                    'name' => 'سندات الصرف',
                    'icon' => asset('icons/financial_receipt.png'),
                    'count' => 1,
                ],

                [
                    'key' => 'financial_cash',
                    'name' => 'سندات القبض',
                    'icon' => asset('icons/financial_cash.png'),
                    'count' => 2,
                ],

                [
                    'key' => 'expenses',
                    'name' => 'المصروفات',
                    'icon' => asset('icons/expenses.png'),
                    'count' => 300,
                ],

                [
                    'key' => 'employees',
                    'name' => 'الموظفين',
                    'icon' => asset('icons/employees.png'),
                    'count' => 1,
                ],

                [
                    'key' => 'profits',
                    'name' => 'الايردات',
                    'icon' => asset('icons/profits.png'),
                    'count' => 2,
                ],

                [
                    'key' => 'tenant_stats',
                    'name' => 'عقارات الايجار',
                    'icon' => asset('icons/tenant_stats.png'),
                    'count' => 2,
                ],

                [
                    'key' => 'selling_states',
                    'name' => 'عقارات البيع',
                    'icon' => asset('icons/selling_states.png'),
                    'count' => 3,
                ],
            ],


        ];

    }



}

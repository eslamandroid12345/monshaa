<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'logo' => $this->company->logo != null ? asset($this->company->logo) : null,
            'name' => $this->name,
            'job_title' => $this->job_title,
            'currency' => $this->company->currency,
            'permissions' => $this->getAllPermissions(),
            'user_type' => 'employee',
            'company_name' => $this->company->company_name,
            'company_phone' => $this->company->company_phone,
            'company_address' => $this->company->company_address,
            'phone' => $this->phone,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
            'token' => 'Bearer '.$this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];
    }

    private function getAllPermissions(): array
    {

        $permissions = [];
        foreach (json_decode($this->employee_permissions,true) as $permission) {
            $permissions[] = $permission;
        }
        return $permissions;

    }
}

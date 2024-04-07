<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeGetDataResource extends JsonResource
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
            'employee_image' => $this->employee_image,
            'name' => $this->name,
            'job_title' => $this->job_title,
            'currency' => $this->company->currency,
            'permissions' => $this->getAllPermissions(),
            'address' => $this->employee_address,
            'phone' => $this->phone,
            'user_type' => $this->is_admin == 1 ? 'manger' : 'employee',
            'card_number' => $this->card_number,
            'status' => $this->is_active == 1 ? 'active' : 'not_active',
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
        $permissions[] = 'setting';
        $permissions[] = 'home_page';

        return $permissions;

    }
}

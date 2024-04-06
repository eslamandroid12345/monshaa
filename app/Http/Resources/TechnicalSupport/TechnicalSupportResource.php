<?php

namespace App\Http\Resources\TechnicalSupport;

use Illuminate\Http\Resources\Json\JsonResource;

class TechnicalSupportResource extends JsonResource
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
            'company_logo' => $this->user->company->logo,
            'employee_name' => $this->user->name,
            'company_name' => $this->user->company->company_name,
            'company_phone' => $this->user->company->company_phone,
            'subject' => $this->subject,
            'message' => $this->message,

        ];
    }
}

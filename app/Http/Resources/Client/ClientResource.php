<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'employee' => $this->user->name,
            'code' => $this->code,
            'name' => $this->name,
            'department' => $this->department,
            'phone' => $this->phone,
            'inspection_date' => $this->inspection_date,
            'notes' => $this->notes,
            'status' => $this->status,


        ];
    }
}

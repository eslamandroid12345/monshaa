<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientShowResource extends JsonResource
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
            'code' => $this->code ?? 0,
            'name' => $this->name,
            'department' => $this->department,
            'phone' => $this->phone,
            'inspection_date' => $this->inspection_date,
            'inspection_time' => $this->inspection_time,
            'notes' => $this->notes,
            'client_type' => $this->client_type,
            'status' => $this->status,


        ];
    }
}

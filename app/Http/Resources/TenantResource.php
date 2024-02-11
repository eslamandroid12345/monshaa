<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    private static int $order = 1;

    public function toArray($request)
    {

        $ordered = self::$order++;

        return [

            'id' => $this->id,
            'number' => $ordered,
            'name' => $this->name,
            'phone' => $this->phone,
            'card_number' => $this->card_number,
            'card_address' => $this->card_address,
            'job_title' => $this->job_title,
            'nationality' => $this->nationality,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];


    }


}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfitResource extends JsonResource
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

            'total_revenue' => $this->resource['total_revenue'],
            'total_expense' => $this->resource['total_expense'],
            'total_profits' => $this->resource['total_profits'],
            'date' => $this->resource['date'],
        ];
    }
}

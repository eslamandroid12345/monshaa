<?php

namespace App\Http\Resources\Profits;

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

            'total_revenue' => 10,
            'total_expense' => 10,
            'total_profits' => 10,
            'transaction_date' => '2024-03-01',

        ];
    }
}

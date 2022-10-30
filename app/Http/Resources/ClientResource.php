<?php

namespace App\Http\Resources;

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
            'name' => $this->name,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'rate' => $this->rate,
            'taxable' => $this->taxable,
            'comments' => $this->comments,
            'address' => $this->address,
            'guardian_name' => $this->guardian_name,
            'extra_phone' => $this->extra_phone,
            'birthday' => $this->birthday,
            'medicine' => $this->medicine,
            'diagnosis' => $this->diagnosis,
            'treatment' => $this->treatment,
            'health_insurance' => $this->health_insurance,
            'affiliate' => $this->affiliate,
            'budget_date' => $this->budget_date,
            'created_at' => $this->created_at,
        ];
    }
}

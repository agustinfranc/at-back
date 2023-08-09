<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'extra_phone' => $this->extra_phone,
            'extra_phone_reference' => $this->extra_phone_reference,
            'extra_phone_bis' => $this->extra_phone_bis,
            'extra_phone_bis_reference' => $this->extra_phone_bis_reference,
            'rate' => $this->rate,
            'companion_rate' => $this->companion_rate,
            'taxable' => $this->taxable,
            'comments' => $this->comments,
            'address' => $this->address,
            'guardian_name' => $this->guardian_name,
            'birthday' => $this->birthday,
            'medicine' => $this->medicine,
            'diagnosis' => $this->diagnosis,
            'treatment' => $this->treatment,
            'health_insurance' => $this->health_insurance,
            'affiliate' => $this->affiliate,
            'budget_date' => $this->budget_date,
        ];
    }
}

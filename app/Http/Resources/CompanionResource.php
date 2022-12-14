<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanionResource extends JsonResource
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
        'cuit' => $this->cuit,
        'nationality' => $this->nationality,
        'birthday' => $this->birthday,
        'phone' => $this->phone,
        'extra_phone' => $this->extra_phone,
        'extra_phone_reference' => $this->extra_phone_reference,
        'max_taxable' => $this->max_taxable,
        'monotax' => $this->monotax,
        'criminal_record' => $this->criminal_record,
        'insurance' => $this->insurance,
        'has_sign_contract' => $this->has_sign_contract,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        ];
    }
}

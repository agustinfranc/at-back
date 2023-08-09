<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientCollectionResource extends JsonResource
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
            'rate' => $this->rate,
            'companion_rate' => $this->companion_rate,
            'taxable' => $this->taxable,
            'guardian_name' => $this->guardian_name,
        ];
    }
}

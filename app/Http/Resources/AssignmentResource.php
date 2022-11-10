<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
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
            'client' => $this->client,
            'companion' => $this->companion,
            'date' => $this->date,
            'hours' => $this->hours,
            'from' => $this->from,
            'to' => $this->to,
            'created_at' => $this->created_at,
        ];
    }
}

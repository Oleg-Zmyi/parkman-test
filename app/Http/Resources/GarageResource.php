<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GarageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'hourly_price' => $this->hourly_price,
            'currency' => $this->currency,
            'country' => $this->country,
            'contact_email' => $this->contact_email,
            'point' => $this->latitude . ' ' . $this->longitude,
        ];
    }
}

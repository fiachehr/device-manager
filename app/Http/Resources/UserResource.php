<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'billing_name' => $this->billing_name,
            'address_country' => $this->address_country,
            'address_zip' => $this->address_zip,
            'address_city' => $this->address_city,
            'address_street' => $this->address_street,
            'vat_number' => $this->vat_number,
        ];
    }
}

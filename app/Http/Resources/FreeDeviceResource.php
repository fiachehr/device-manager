<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FreeDeviceResource extends JsonResource
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
            'deviceId' => $this->id,
            'deviceType' => $this->deviceType,
            "leasingPeriods" => [],
            'timestamp' => $this->created_at,
        ];
    }
}

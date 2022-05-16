<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\LeasingResource;

class DeviceInformationResource extends JsonResource
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
            'deviceOwner' => $this->user->billing_name,
            'deviceOwnerDetails' => new UserResource($this->user),
            'dateofRegistration' => $this->created_at,
            'leasingPeriodsComputed' => new LeasingResource($this->leasings[0]),
            'leasingPeriods' => LeasingResource::collection($this->leasings),

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeasingListResource extends JsonResource
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
            'leasingConstructionId' => $this->id,
            'leasingConstructionMaximumTraining' => $this->leasingMaximumTraining,
            'leasingConstructionMaximumDate' => $this->leasingMaximumDate,
        ];
    }
}

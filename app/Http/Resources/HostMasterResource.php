<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HostMasterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id'            => $this->ID,
            'lineCode'      => $this->lineCode,
            'hostID'         => $this->hostID,
            'updated_at'    => $this->UPDATED_AT
            //'user' => $this->user->name,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartStructResource extends JsonResource
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
            'parentPartNo'  => $this->parentPartNo,
            'childPartNo'   => $this->childPartNo,
            'status'        => $this->status,
            //'user' => $this->user->name,
        ];
    }
}

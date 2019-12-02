<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessMasterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id'            => $this->id,
            'lineCode'      => $this->lineCode,
            'processID'     => $this->processID,
            'updated_at'    => $this->UPDATED_AT
            //'user' => $this->user->name,
        ];
    }
}

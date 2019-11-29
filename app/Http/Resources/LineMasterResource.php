<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LineMasterResource extends JsonResource
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
            'orderCode'     => $this->orderCode,
            'lineCode'      => $this->lineCode,
            'ratio'         => $this->ratio,
            'priorityFlag'  => $this->priorityFlag,
            'updated_at'    => $this->updated_at
            //'user' => $this->user->name,
        ];
    }
}

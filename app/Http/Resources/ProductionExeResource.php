<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductionExeResource extends JsonResource
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
            'turnNo'        => $this->turnNo,
            'orderCode'     => $this->ORDER_CODE,
            'lineCode'      => $this->LINE_CODE,
            'partNo'        => $this->PART_NO,
            'partSpec'      => $this->partSpec,
            'planQty'       => $this->PLAN_QTY,
            'delayQty'      => $this->DELAY_QTY,
            'packingQty'    => $this->PACKING_QTY,    
            'orderQty'      => $this->ORDER_QTY,      
            'orderQty1'     => $this->ORDER_QTY_1,   
            'orderQty2'     => $this->ORDER_QTY_2,   
            'orderQty3'     => $this->ORDER_QTY_3,       
            'planDate'      => $this->PLAN_DATE,
            'status'        => $this->status,
            'startDate'     => $this->startDate,
            'endDate'       => $this->endDate
            //'user' => $this->user->name,
        ];
    }
}

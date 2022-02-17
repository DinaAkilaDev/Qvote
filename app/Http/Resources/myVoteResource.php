<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class myVoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
         $active=0;
        $this->is_active ==1?$active=true:$active=false;
        return [
            'id'=>$this->id,
            'question'=>$this->question,
            'company'=>$this->company,
            'start_at'=>Carbon::parse($this->start_at)->format('d-m-Y i'),
            'end_at'=>Carbon::parse($this->end_at)->format('d-m-Y i'),
            'active'=>$active,
            'type'=>$this->type,
            ];
    }
}

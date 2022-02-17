<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userVoteResource extends JsonResource
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
            'id'=>$this->id,
            'mac_address'=>$this->mac_address,
            'vote'=>new myVoteResource($this->Vote),
            'candidate'=>new candidateResource($this->Candidate),
        ];
    }
}

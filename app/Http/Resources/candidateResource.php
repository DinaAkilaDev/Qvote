<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class candidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


    public function toArray($request)
    {
        $candite_count = $this->UserVotes()->count();

        $total_vote = $request->get('total_vote');
        $prec = ($candite_count/$total_vote) *100.0;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => $this->photo,
            'vote_precentage' => $prec,
            'total_votes' => $candite_count,
        ];
    }
}

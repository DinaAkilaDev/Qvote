<?php

namespace App\Http\Resources;

use App\Models\UserVote;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class voteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $active = $this->is_active?:false;
        $total_vote = $this->UserVotes()->count();

        $request->request->add(['total_vote'=>$total_vote]);
        return [
            'id'=>$this->id,
            'question'=>$this->question,
            'company'=>$this->company,
            'start_at'=>Carbon::parse($this->start_at),
            'end_at'=>Carbon::parse($this->end_at),
            'active'=>$active,
            'type'=>$this->type,
            'candidates'=>candidateResource::collection($this->Candidates),
        ];
    }
}

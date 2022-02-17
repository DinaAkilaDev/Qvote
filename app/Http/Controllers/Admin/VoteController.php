<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use App\Repositories\VoteEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoteController extends Controller
{
    public function __construct(VoteEloquent $voteEloquent)
    {
        $this->vote = $voteEloquent;
    }

    public function display()
    {
        return $this->vote->display();

    }

    public function candidates($vote_id)
    {
        return $this->vote->candidates($vote_id);

    }

    public function new()
    {
        return $this->vote->new();
    }

    public function addvote(Request $request)
    {
        return $this->vote->addvote($request->all());
    }

    public function deletevote($id)
    {
        return $this->vote->deletevote($id);

    }

    public function editvote($id)
    {
        return $this->vote->editvote($id);

    }

    public function addeditvote(Request $request)
    {
        return $this->vote->addeditvote($request->all());

    }
}

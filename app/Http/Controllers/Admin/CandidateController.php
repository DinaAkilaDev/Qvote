<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use App\Repositories\CandidateEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CandidateController extends Controller
{
    public function __construct(CandidateEloquent $candidateEloquent)
    {
        $this->candidate = $candidateEloquent;
    }
    public function deletecandidate($id)
    {
        return $this->candidate->deletecandidate($id);
    }

    public function editcandidate($id)
    {
        return $this->candidate->editcandidate($id);

    }

    public function addeditcandidate(Request $request)
    {
        return $this->candidate->addeditcandidate($request->all());

    }

    public function add(Request $request,$vote_id)
    {
        return $this->candidate->add($request->all(),$vote_id);
    }

    public function addcandidate(Request $request)
    {
        return $this->candidate->addcandidate($request->all());

    }
}

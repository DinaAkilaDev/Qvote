<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Vote;
use App\Repositories\VoteEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class VoteController extends Controller
{
    public function __construct(VoteEloquent $voteEloquent)
    {
        $this->vote = $voteEloquent;
    }

//    public function display(Request $request)
//    {
//        return $this->vote->display($request->all());
//
//    }
    public function index()
    {
        return $this->vote->index();
    }

    public function getVote(Request $request)
    {
        if ($request->ajax()) {
            $data = Vote::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="" class="edit btn btn-success btn-sm">Edit</a>
 <a href="/vote/delete/id" class="delete btn btn-danger btn-sm">Delete</a>';
                })->make(true);
        }
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

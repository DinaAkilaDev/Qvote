<?php

namespace App\Repositories;

use App\Http\Resources\userVoteResource;
use App\Http\Resources\voteResource;
use App\Models\Candidate;
use App\Models\UserVote;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VoteEloquent
{
    public function show()
    {
        $page_number = intval(\request()->get('page_number'));
        $page_size = \request()->get('page_size');
        $total_records = Vote::count();
        $total_pages = ceil($total_records / $page_size);
        $votes = Vote::skip(($page_number - 1) * $page_size)
            ->take($page_size)->get();
        return response_api(true, 200, 'Success', voteResource::collection($votes), $page_number, $total_pages, $total_records);

    }

    public function add(array $data)
    {
        $vote = new UserVote();
        $is_voted = UserVote::where('mac_address', $data['mac_address'])->first();
        if ($is_voted == null) {
            $vote->mac_address = $data['mac_address'];
            if (Vote::find($data['vote_id'])) {
                $vote->vote_id = $data['vote_id'];
            } else {
                return response_api(false, 400, 'There is no id like this in votes!', '');
            }
            if (Candidate::find($data['candidate_id'])) {
                $vote->candidate_id = $data['candidate_id'];
            } else {
                return response_api(false, 400, 'There is no id for candidate!', '');
            }
            $vote->save();

            return response_api(true, 200, 'Successfully Added!', new userVoteResource($vote));
        } elseif ($is_voted['vote_id'] == $data['vote_id']) {
            return response_api(false, 400, 'You vote in this question before!', '');
        }


    }

    public function display()
    {
        $vote = Vote::paginate(10);
        return view('vote')->with('vote', $vote);
    }

    public function candidates($vote_id)
    {
        $candidates = Candidate::where('vote_id', $vote_id)->get();
        return view('candidate', compact('vote_id'))->with('candidate', $candidates);
    }

    public function new()
    {
        return view('createvote');
    }

    public function addvote(array $data)
    {
        $data = request()->only('question', 'company', 'start_at',
            'end_at', 'is_active', 'type', 'name1', 'name2', 'photo1', 'photo2', 'vote_precentage', 'vote_id ');

        $vote = Vote::create([
            'question' => $data['question'],
            'company' => $data['company'],
            'start_at' => $data['start_at'],
            'end_at' => $data['end_at'],
            'is_active' => 1,
            'type' => 'public',
        ]);
        $candidate1 = Candidate::create([
            'name' => $data['name1'],
            'photo' => $data['photo1'],
            'vote_precentage' => 0,
            'vote_id' => $vote->id,

        ]);
        $candidate2 = Candidate::create([
            'name' => $data['name2'],
            'photo' => $data['photo2'],
            'vote_precentage' => 0,
            'vote_id' => $vote->id,

        ]);

        return Redirect::back()->withErrors(['Added Successfully', 'The Message']);
    }

    public function deletevote($id)
    {
        $vote = Vote::find($id);
        $vote->destroy($id);
        return Redirect::back();
    }

    public function editvote($id)
    {
        $vote = Vote::find($id);
        return view('editvote')->with(compact('vote'));
    }

    public function addeditvote(array $data)
    {
        $id = $data['id'];
        $vote = Vote::find($id);
        $vote->question = $data['question'];
        $vote->company = $data['company'];
        $vote->start_at = $data['start_at'];
        $vote->end_at = $data['end_at'];
        if ($data['is_active'] == null) {
            $vote->is_active = 0;

        } else {
            $vote->is_active = $data['is_active'];

        }

        $vote->type = $data['type'];
        $vote->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }
}

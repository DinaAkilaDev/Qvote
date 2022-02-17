<?php

namespace App\Repositories;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CandidateEloquent
{
    public function deletecandidate($id)
    {
        $candidate = Candidate::find($id);
        $candidate->destroy($id);
        return Redirect::back();
    }

    public function editcandidate($id)
    {
        $candidate = Candidate::find($id);
        return view('editcandidate')->with(compact('candidate'));
    }
    public function add(array $data,$vote_id){
        return view('createcandidate',compact('vote_id'));
    }
    public function addcandidate(array $data)
    {
        $data = request()->only('name', 'photo','vote_precentage','vote_id');

        $candidate = Candidate::create([
            'name' => $data['name'],
            'photo' => $data['photo'],
            'vote_precentage' => 0,
            'vote_id' => $data['vote_id'],
        ]);

        return Redirect::back()->withErrors(['Added Successfully', 'The Message']);
    }

    public function addeditcandidate(array $data)
    {
        $id = $data['id'];
        $candidate = Candidate::find($id);
        $candidate->name = $data['name'];
        $candidate->photo = $data['photo'];
        $candidate->save();
        return Redirect::back()->withErrors(['Edited Successfully', 'The Message']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\UserVote;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_vote=Vote::count();
        $total_vote_users=UserVote::count();
        $total_candidate=Candidate::count();
        $vote=Vote::orderBy('id', 'DESC')->get();
        $most_vote=DB::table('user_votes')
            ->select('vote_id', DB::raw('count(*) as total'))
            ->groupBy('vote_id')
            ->get();
        return view('home')->with('vote',$vote)->with('total_vote',$total_vote)
            ->with('total_vote_users',$total_vote_users)->with('total_candidate',$total_candidate)
            ->with('most_vote',$most_vote);
    }
}

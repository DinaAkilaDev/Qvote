<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\VoteEloquent;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct(VoteEloquent $voteEloquent)
    {
        $this->vote = $voteEloquent;
    }

    public function show()
    {
        return $this->vote->show();
    }

    public function add(Request $request)
    {
        return $this->vote->add($request->all());
    }
}

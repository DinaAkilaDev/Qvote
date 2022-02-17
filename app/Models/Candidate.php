<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'vote_precentage',
        'vote_id'
    ];
    public function Vote(){
        return $this->belongsTo(Vote::class,'vote_id');
    }
    public function UserVotes(){
        return $this->hasMany(UserVote::class,'candidate_id');
    }
}

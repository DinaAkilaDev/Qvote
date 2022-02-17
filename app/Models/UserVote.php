<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'mac_address',
        'vote_id',
        'candidate_id',
    ];
    public function Vote(){
        return $this->belongsTo(Vote::class,'vote_id');
    }
    public function Candidate(){
        return $this->belongsTo(Candidate::class,'candidate_id');
    }
}

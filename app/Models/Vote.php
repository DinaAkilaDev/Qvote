<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $casts = ['is_active' => 'boolean'];
    protected $fillable = [
        'question',
        'company',
        'start_at',
        'end_at',
        'is_active',
        'type',
    ];
    public function Candidates()
    {
        return $this->hasMany(Candidate::class, 'vote_id');
    }

    public function UserVotes()
    {
        return $this->hasMany(UserVote::class, 'vote_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeVote extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'user_id',
        'voter_user_id',
        'challenge_id',
        'vote',
        'appreciate',
        'status',
    ];

    public function challenge() {
        return $this->belongsTo(Challenge::class); // Corrected the relation
    }

    public function challengeImage() {
        return $this->belongsTo(ChallengeImage::class); // Corrected the relation
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id'); // Corrected the relation
    }

    public function vote_user() {
        return $this->belongsTo(User::class,'voter_user_id'); // Corrected the relation
    }

    public function challengeSubscriber() {
        return $this->belongsTo(ChallengeSubscriber::class); // Corrected the relation
    }
}

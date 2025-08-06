<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'entry_free',
        'price_money',
        'vote_start_date',
        'vote_end_date',
        'challenge_slug',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'vote_start_date' => 'datetime',
        'vote_end_date' => 'datetime',
    ];

    public function challengeSubscribers() {
        return $this->hasMany(ChallengeSubscriber::class);
    }

    public function challengeRules() {
        return $this->hasMany(ChallengeRule::class);
    }

    public function challengeImages() {
        return $this->hasMany(ChallengeImage::class);
    }

    public function challengeVotes() {
        return $this->hasMany(ChallengeVote::class);
    }
    public function users() {
        return $this->hasMany(User::class);
    }

}

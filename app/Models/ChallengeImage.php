<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'image',
        'day',
        'status',
    ];

    public function challengeVote() {
        return $this->hasMany(ChallengeVote::class); // Corrected the relation
    }

    public function challenge() {
        return $this->belongsTo(Challenge::class); // Corrected the relation
    }

    public function user() {
        return $this->belongsTo(User::class); // Corrected the relation
    }
}

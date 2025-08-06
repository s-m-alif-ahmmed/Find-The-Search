<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeSubscriber extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'user_id',
        'challenge_id',
        'entry_fee',
        'payment_status',
    ];

    public function challenge() {
        return $this->belongsTo(Challenge::class); // Corrected the relation
    }

    public function user() {
        return $this->belongsTo(User::class); // Corrected the relation
    }

}

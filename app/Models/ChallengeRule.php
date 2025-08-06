<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeRule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'challenge_id',
        'rule',
    ];

    public function challenge() {
        return $this->belongsTo(Challenge::class); // Corrected the relation
    }

}

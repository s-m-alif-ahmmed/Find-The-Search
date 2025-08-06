<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Notification extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'id';  // UUID primary key

    // Define the relationship with the Challenge model
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    // Define the notifiable entity relationship (e.g., User)
    public function notifiable()
    {
        return $this->morphTo();
    }
}

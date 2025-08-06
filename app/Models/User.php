<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Namu\WireChat\Traits\Chatable;

//use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Chatable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at'     => 'datetime',
            'password'              => 'hashed',
            'terms_and_policy'      => 'boolean',
            'promotion_permission'  => 'boolean',
            'fast_name'             => 'string',
            'last_name'             => 'string',
            'email'                 => 'string',
            'avatar'                => 'string',
            'number'                => 'string',
            'country'               => 'string',
            'job_title'             => 'string',
            'dob'                   => 'date',
            'gender'                => 'string',
            'google_id'             => 'string',
            'apple_id'              => 'string',
            'reset_code'            => 'string',
            'reset_code_expires_at' => 'datetime',
        ];
    }


    public function challengeSubscribers() {
        return $this->hasMany(ChallengeSubscriber::class);
    }
    public function challengeImages() {
        return $this->hasMany(ChallengeImage::class);
    }
    public function challengeVotes() {
        return $this->hasMany(ChallengeVote::class);
    }


    /**
     * Returns the URL for the user's cover image (avatar).
     * Adjust the 'avatar_url' field to your database setup.
     */
    public function getCoverUrlAttribute(): ?string
    {
        return $this->avatar_url ?? null;
    }

    /**
     * Returns the URL for the user's profile page.
     * Adjust the 'profile' route as needed for your setup.
     */
    public function getProfileUrlAttribute(): ?string
    {
        return route('profile', ['id' => $this->id]);
    }


    /**
     * Returns the display name for the user.
     * Modify this to use your preferred name field.
     */
    public function getDisplayNameAttribute(): ?string
    {
        return ($this->first_name && $this->last_name)
            ? $this->first_name.' '.$this->last_name
            : 'user';
    }

    /**
     * Search for users when creating a new chat or adding members to a group.
     * Customize the search logic to limit results, such as restricting to friends or eligible users only.
     */
    public function searchChatables(string $query): ?Collection
    {
        if (auth()->user()->role === 'admin'){
            $searchableFields = ['first_name', 'last_name'];
            return User::where('role', 'user')
                ->where(function ($queryBuilder) use ($searchableFields, $query) {
                    foreach ($searchableFields as $field) {
                        $queryBuilder->orWhere($field, 'LIKE', '%'.$query.'%');
                    }
                })
                ->limit(20)
                ->get();
        } elseif (auth()->user()->role === 'user'){
            $searchableFields = ['first_name', 'last_name'];
            return User::where('role', 'admin')
            ->where(function ($queryBuilder) use ($searchableFields, $query) {
                foreach ($searchableFields as $field) {
                    $queryBuilder->orWhere($field, 'LIKE', '%'.$query.'%');
                }
            })
            ->limit(20)
            ->get();
        }
    }


    /**
     * Determine if the user can create new groups.
     */
    public function canCreateGroups(): bool
    {
        return false;
    }

    /**
     * Determine if the user can create new groups with other users
     */
    public function canCreateChats(): bool
    {
        return true;
    }


}

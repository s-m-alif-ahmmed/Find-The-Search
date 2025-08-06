<?php

namespace Namu\WireChat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Namu\WireChat\Enums\ParticipantRole;
use Namu\WireChat\Facades\WireChat;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'name',
        'description',
    ];

    protected $casts = [
        'allow_members_to_send_messages' => 'boolean',
        'allow_members_to_add_others' => 'boolean',
        'allow_members_to_edit_group_info' => 'boolean',

    ];

    public function __construct(array $attributes = [])
    {
        $this->table = WireChat::formatTableName('groups');
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        // listen to deleted
        static::deleted(function ($group) {

            if ($group->cover?->exists()) {

                //delete cover
                $group->cover?->delete();

                //also delete from storage
                if (file_exists(Storage::disk(WireChat::storageDisk())->exists($group->cover->file_path))) {
                    Storage::disk(WireChat::storageDisk())->delete($group->cover->file_path);
                }
            }

        });
    }

    /**
     * since you have a non-standard namespace;
     * the resolver cannot guess the correct namespace for your Factory class.
     * so we exlicilty tell it the correct namespace
     */
    protected static function newFactory()
    {
        return \Namu\WireChat\Workbench\Database\Factories\GroupFactory::new();
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function getCoverUrlAttribute(): ?string
    {

        return $this->cover?->url;

    }

    /**
     * Check if group is owned by
     */
    public function isOwnedBy(Model $user): bool
    {

        $conversation = $this->conversation;

        // Check if participants are already loaded
        if ($conversation->relationLoaded('participants')) {
            // If loaded, simply check the existing collection
            return $conversation->participants->contains(function ($participant) use ($user) {
                return $participant->participantable_id == $user->id &&
                    $participant->participantable_type == get_class($user) &&
                    $participant->role == ParticipantRole::OWNER;
            });
        }

        // If not loaded, perform the query
        return $conversation->participants()
            ->where('participantable_id', $user->id)
            ->where('participantable_type', get_class($user))
            ->where('role', ParticipantRole::OWNER)
            ->exists();
    }

    public function cover()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

    /**
     * Permissions
     */
    public function allowsMembersToSendMessages(): bool
    {
        return $this->allow_members_to_send_messages == true;
    }

    public function allowsMembersToAddOthers(): bool
    {
        return $this->allow_members_to_add_others == true;
    }

    public function allowsMembersToEditGroupInfo(): bool
    {
        return $this->allow_members_to_edit_group_info == true;
    }
}

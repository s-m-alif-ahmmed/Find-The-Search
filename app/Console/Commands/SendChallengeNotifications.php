<?php


namespace App\Console\Commands;

use App\Models\Challenge;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\ChallengeNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendChallengeNotifications extends Command
{
    protected $signature = 'challenge:notify';
    protected $description = 'Send notifications when a challenge starts, ends, or voting begins/ends';

    public function handle()
    {
        // Get all active challenges
        $challenges = Challenge::where('status', 'active')
            ->where(function ($query) {
                $query->where('start_date', '<=', Carbon::now())
                    ->orWhere('end_date', '<=', Carbon::now())
                    ->orWhere('vote_start_date', '<=', Carbon::now())
                    ->orWhere('vote_end_date', '<=', Carbon::now());
            })
            ->get();

        foreach ($challenges as $challenge) {
            // Check each event (start, end, voting start, voting end) and send notification if it has not been sent yet
            $this->checkAndSendNotification($challenge, 'started', 'Challenge Start', 'start', $challenge->start_date);
            $this->checkAndSendNotification($challenge, 'ended', 'Challenge End', 'end', $challenge->end_date);
            $this->checkAndSendNotification($challenge, 'voting_started', 'Vote Start', 'vote start', $challenge->vote_start_date);
            $this->checkAndSendNotification($challenge, 'voting_ended', 'Vote End', 'vote end', $challenge->vote_end_date);
        }
    }

    private function checkAndSendNotification($challenge, $type, $title, $message, $eventDate)
    {
        // If the event date is in the past, check for existing notification
        if ($eventDate <= Carbon::now()) {
            $existingNotification = Notification::where('data->type', $type)
                ->where('data->challenge_id', $challenge->id)
                ->exists();

            // If no notification exists, send a new one
            if (!$existingNotification) {
                $this->sendNotification($challenge, $type, $title, $message);
            }
        }
    }

    private function sendNotification($challenge, $type, $title, $message)
    {
        // Get all users (or target specific users)
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new ChallengeNotification($challenge, $type, $title, $message));
        }
    }
}


<?php


namespace App\Notifications;

use App\Models\Challenge;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ChallengeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $challenge;
    protected $type;
    protected $title;
    protected $message;

    public function __construct(Challenge $challenge, $type, $title, $message)
    {
        $this->challenge = $challenge;
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // We only want to save the notification in the database
    }

    public function toDatabase($notifiable)
    {
        return [
            'challenge_id' => $this->challenge->id,
            'type' => $this->type,
            'title' => $this->title,
            'data' => "The '{$this->challenge->name}' is now {$this->message}.",
        ];
    }
}













//namespace App\Notifications;
//
//use App\Models\Challenge;
//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Notifications\Notification;
//
//class ChallengeNotification extends Notification implements ShouldQueue
//{
//    use Queueable;
//
//    protected $challenge;
//    protected $type;
//    protected $title;
//    protected $message;
//
//    public function __construct(Challenge $challenge, $type, $title, $message)
//    {
//        $this->challenge = $challenge;
//        $this->type = $type;
//        $this->title = $title;
//        $this->message = $message;
//    }
//
//    public function via($notifiable)
//    {
//        return ['database']; // We only want to save the notification in the database
//    }
//
//    public function toDatabase($notifiable)
//    {
//        return [
//            'challenge_id' => $this->challenge->id,
//            'type' => $this->type,
//            'title' => $this->title,
//            'data' => "The '{$this->challenge->name}' is now {$this->message}.",
//        ];
//    }
//}

<?php

namespace App\Notifications;

use App\Models\Track;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewLike extends Notification
{
    use Queueable;

    public function __construct(
        protected Track $track,
        protected User $liker
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'type' => 'new_like',
            'message' => "{$this->liker->name} liked your track: {$this->track->title}",
            'track_id' => $this->track->id,
            'track_title' => $this->track->title,
            'liker_id' => $this->liker->id,
            'liker_name' => $this->liker->name,
            'cover_image' => $this->track->cover_image
        ];
    }
}
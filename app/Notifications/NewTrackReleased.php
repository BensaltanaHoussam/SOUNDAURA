<?php

namespace App\Notifications;

use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewTrackReleased extends Notification
{
    use Queueable;

    protected $track;

    public function __construct(Track $track)
    {
        $this->track = $track;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'type' => 'new_track',
            'message' => "{$this->track->user->name} has released a new track: {$this->track->title}",
            'track_id' => $this->track->id,
            'artist_id' => $this->track->user_id,
            'cover_image' => $this->track->cover_image,
            'track_title' => $this->track->title,
            'artist_name' => $this->track->user->name
        ];
    }
}
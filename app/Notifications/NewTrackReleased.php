<?php

namespace App\Notifications;

use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NewTrackReleased extends Notification
{
    use Queueable;

    public function __construct(
        protected Track $track
    ) {
        Log::info('Creating notification for track: ' . $track->title);
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        Log::info('Converting notification to database format', [
            'track_id' => $this->track->id,
            'notifiable_id' => $notifiable->id
        ]);

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
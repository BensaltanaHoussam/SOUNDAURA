<?php

namespace App\Notifications;

use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTrackReleased extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        protected Track $track
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Track Released: ' . $this->track->title)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line($this->track->artist->name . ' has just released a new track: ' . $this->track->title)
            ->action('Listen Now', url('/tracks/' . $this->track->id))
            ->line('Thank you for using SoundAura!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'new_track',
            'message' => $this->track->artist->name . ' has released a new track: ' . $this->track->title,
            'track_id' => $this->track->id,
            'artist_id' => $this->track->artist_id,
            'cover_image' => $this->track->cover_image,
            'track_title' => $this->track->title,
            'artist_name' => $this->track->artist->name
        ];
    }
}
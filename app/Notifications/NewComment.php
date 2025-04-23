<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewComment extends Notification
{
    use Queueable;

    public function __construct(
        protected Comment $comment,
        protected User $commenter
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'type' => 'new_comment',
            'message' => "{$this->commenter->name} commented on your album: {$this->comment->album->title}",
            'album_id' => $this->comment->album_id,
            'album_title' => $this->comment->album->title,
            'comment_id' => $this->comment->id,
            'comment_text' => $this->comment->content,
            'commenter_id' => $this->commenter->id,
            'commenter_name' => $this->commenter->name,
            'commenter_avatar' => $this->commenter->avatar ?? 'default-avatar.png'
        ];
    }
}
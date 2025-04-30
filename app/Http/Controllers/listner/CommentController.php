<?php

namespace App\Http\Controllers\Listner;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Album;
use App\Notifications\NewComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'album_id' => 'required|exists:albums,id'
        ]);

        $comment = Comment::create([
            'content' => $validated['content'],
            'album_id' => $validated['album_id'],
            'user_id' => auth()->id()
        ]);


        $album = Album::find($validated['album_id']);
        $artist = $album->user;
        if (auth()->id() !== $artist->id) {
            $artist->increment('aura', 100);
        }

        // Get the album and its artist
        $album = Album::findOrFail($validated['album_id']);

        // Send notification if commenter is not the album owner
        if ($album->user_id !== auth()->id()) {
            $album->user->notify(new NewComment($comment, auth()->user()));
        }

        return back()->with('success', 'Comment added successfully!');
    }
}
<?php

namespace App\Http\Controllers\Listner;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'album_id' => 'required|exists:albums,id'
        ]);

        Comment::create([
            'content' => $validated['content'],
            'album_id' => $validated['album_id'],
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}
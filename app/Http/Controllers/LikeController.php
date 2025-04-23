<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Like;
use App\Models\User;
use App\Notifications\NewLike;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Track $track)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Please login to like tracks');
        }

        $user = auth()->user();
        
        $existing = Like::where('user_id', $user->id)
            ->where('track_id', $track->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $message = 'Track unliked successfully';
        } else {
            Like::create([
                'user_id' => $user->id,
                'track_id' => $track->id
            ]);

            // Send notification to track owner if it's not the same user
            if ($track->user_id !== $user->id) {
                // Pass both track and liker (current user) to the notification
                $track->user->notify(new NewLike($track, $user));
            }

            $message = 'Track liked successfully';
        }

        return back()->with('success', $message);
    }
}
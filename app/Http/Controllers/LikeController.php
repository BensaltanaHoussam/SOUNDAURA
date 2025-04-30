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
            return response()->json([
                'success' => false,
                'message' => 'Please login to like tracks'
            ], 401);
        }

        $user = auth()->user();
        $existing = Like::where('user_id', $user->id)
            ->where('track_id', $track->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $user->id,
                'track_id' => $track->id
            ]);

            $artist = $track->user;
            if (auth()->id() !== $artist->id) {
                $artist->increment('aura', 50);
            }

            if ($track->user_id !== $user->id) {
                $track->user->notify(new NewLike($track, $user));
            }
            $liked = true;
        }

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likesCount' => $track->likes()->count()
        ]);
    }
}
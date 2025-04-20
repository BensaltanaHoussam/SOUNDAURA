<?php

namespace App\Http\Controllers\listner;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Track;
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
            $action = 'unliked';
        } else {
            Like::create([
                'user_id' => $user->id,
                'track_id' => $track->id
            ]);
            $action = 'liked';
        }

        return response()->json([
            'success' => true,
            'message' => "Successfully {$action} the track",
            'isLiked' => $action === 'liked',
            'likesCount' => $track->likes()->count()
        ]);
    }
}

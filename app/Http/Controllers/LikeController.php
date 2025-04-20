<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Like;
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
            $message = 'Track liked successfully';
        }

        return back()->with('success', $message);
    }
}
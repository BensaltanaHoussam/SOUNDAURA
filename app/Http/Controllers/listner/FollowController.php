<?php

namespace App\Http\Controllers\Listner;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function toggleFollow(User $artist)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Please login to follow artists');
        }

        $follower = auth()->user();

        if ($follower->id === $artist->id) {
            return back()->with('error', 'You cannot follow yourself');
        }

        $existing = Follow::where('follower_id', $follower->id)
            ->where('followed_id', $artist->id)
            ->first();

        if ($existing) {
            $existing->delete();
            $message = 'Successfully unfollowed the artist';

            if ($artist->aura >= 150) {
                $artist->decrement('aura', 150);
            } else {
                $artist->update(['aura' => 0]); 
            }
        } else {
            Follow::create([
                'follower_id' => $follower->id,
                'followed_id' => $artist->id
            ]);

            $message = 'Successfully followed the artist';
            $artist->increment('aura', 150);
        }

        return back()->with('success', $message);
    }

    public function followers(User $artist)
    {
        $followers = $artist->followers()
            ->with('follower')
            ->paginate(20);

        return view('listner.followers', [
            'user' => $artist,
            'followers' => $followers
        ]);
    }

    public function following(User $artist)
    {
        $following = $artist->following()
            ->with('followed')
            ->paginate(20);

        return view('listner.following', [
            'user' => $artist,
            'following' => $following
        ]);
    }
}
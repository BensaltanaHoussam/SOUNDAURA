<?php

namespace App\Http\Controllers\listner;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favoriteTracks()->with('user')->get();
        return view('listner.favorites', compact('favorites'));
    }


    public function toggleFavorite(Request $request)
    {
        $validated = $request->validate([
            'track_id' => 'required|exists:tracks,id'
        ]);

        $user = auth()->user();
        $track = Track::findOrFail($validated['track_id']);

        if ($user->favoriteTracks()->where('track_id', $track->id)->exists()) {
            $user->favoriteTracks()->detach($track->id);
            $message = 'Track removed from favorites';
        } else {
            $user->favoriteTracks()->attach($track->id);
            $message = 'Track added to favorites';
        }

        return back()->with('success', $message);
    }
}

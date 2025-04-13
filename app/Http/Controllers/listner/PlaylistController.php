<?php

namespace App\Http\Controllers\Listner;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = auth()->user()->playlists()->withCount('tracks')->get();
        return view('listner.playlists', compact('playlists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        $playlist = new Playlist($validated);
        $playlist->user_id = auth()->id();

        if ($request->hasFile('cover_image')) {
            $playlist->cover_image = $request->file('cover_image')
                ->store('playlist-covers', 'public');
        }

        $playlist->save();

        return back()->with('success', 'Playlist created successfully');
    }
}
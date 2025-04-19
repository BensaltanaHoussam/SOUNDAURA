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

    public function addTrack(Request $request, Playlist $playlist)
    {
        $validated = $request->validate([
            'track_id' => 'required|exists:tracks,id'
        ]);

        if (!$playlist->tracks()->where('track_id', $validated['track_id'])->exists()) {
            $playlist->tracks()->attach($validated['track_id']);
            return back()->with('success', 'Track added to playlist successfully');
        }

        return back()->with('error', 'Track already exists in playlist');
    }

    public function show(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        return view('listner.playlistDetails', [
            'playlist' => $playlist->load(['tracks', 'user'])
        ]);
    }

    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        if ($playlist->cover_image) {
            Storage::disk('public')->delete($playlist->cover_image);
        }

        $playlist->delete();

        return redirect()->route('listner.playlists')->with('success', 'Playlist deleted successfully');
    }


    public function update(Request $request, Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($playlist->cover_image) {
                Storage::disk('public')->delete($playlist->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('playlist-covers', 'public');
        }

        $playlist->update($validated);

        return back()->with('success', 'Playlist updated successfully');
    }




}

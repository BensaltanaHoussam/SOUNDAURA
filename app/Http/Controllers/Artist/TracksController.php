<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Models\User;
use App\Notifications\NewTrackReleased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TracksController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'audio_file' => 'required|file|mimes:mp3,wav'
        ]);

        try {
            DB::beginTransaction();

            // Create the track
            $track = Track::create([
                'user_id' => auth()->id(),
                'album_id' => $validated['album_id'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'features' => $validated['features'],
                'category_id' => $validated['category_id'],
                'cover_image' => $request->file('cover_image')->store('covers', 'public'),
                'audio_file' => $request->file('audio_file')->store('tracks', 'public'),
            ]);

            // Get all followers of the artist
            $followers = User::whereIn('id', function($query) {
                $query->select('follower_id')
                      ->from('follows')
                      ->where('following_id', auth()->id());
            })->get();

            // Notify all followers
            foreach ($followers as $follower) {
                $follower->notify(new NewTrackReleased($track));
            }

            DB::commit();
            return redirect()->back()->with('success', 'Track uploaded successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Track upload error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to upload track. Please try again.');
        }
    }
}
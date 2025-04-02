<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TracksController extends Controller
{

    public function store(Request $request)
    {

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'audio_file' => 'required|file|mimes:mp3,wav',
                'cover_image' => 'required|image|mimes:jpeg,png,jpg',
                'description' => 'nullable|string',
                'features' => 'nullable|string',
                'category_id' => 'required|exists:categories,id'
            ]);

            Track::create([
                'user_id' => auth()->id(),
                'title' => $validated['title'],
                'description' => $validated['description'],
                'features' => $validated['features'],
                'category_id' => $validated['category_id'],
                'cover_image' => $request->file('cover_image')->store('covers', 'public'),
                'audio_file' => $request->file('audio_file')->store('tracks', 'public'),
            ]);

            return redirect()->back()->with('success', 'Track uploaded successfully!');
      
    }

}

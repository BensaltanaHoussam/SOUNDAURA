<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumsController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();


        $album = Album::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->album_name,
            'description' => $request->description,
            'cover_image' => $request->file('cover_image')->store('covers', 'public')
        ]);

        $artist = auth()->user(); // Or $album->user
        $artist->increment('aura', 1000);

        // Store each track
        foreach ($request->songs as $songData) {
            Track::create([
                'user_id' => auth()->id(),
                'album_id' => $album->id,
                'category_id' => $request->category_id,
                'title' => $songData['title'],
                'features' => $songData['features'],
                'audio_file' => $songData['audio']->store('tracks', 'public'),
                'cover_image' => $album->cover_image
            ]);
        }

        DB::commit();
        return redirect()->back()->with('success', 'Album created successfully!');
    }
}
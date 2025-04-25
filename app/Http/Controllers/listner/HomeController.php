<?php

namespace App\Http\Controllers\listner;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\category;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artists = User::where('role', 'artiste')
            ->where('status', 'active')
            ->take(7)
            ->get();

        $albums = Album::with('user')
            ->take(2)
            ->get();

        $trendingTracks = Track::withCount('likes')
            ->with('user')
            ->orderByDesc('likes_count')
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->take(6)
            ->get();

        $categories = category::take(4)->get();



        return view('listner.index', compact('artists', 'albums', 'categories', 'trendingTracks'));
    }

    public function showArtistProfile(User $user)
    {

        $randomContent = [
            'tracks' => Track::with('user')
                ->withCount('likes')
                ->where('user_id', '!=', $user->id) // Exclude current artist's tracks
                ->inRandomOrder()
                ->take(6)
                ->get(),
            'albums' => Album::with('user')
                ->withCount('tracks')
                ->where('user_id', '!=', $user->id) // Exclude current artist's albums
                ->inRandomOrder()
                ->take(4)
                ->get()
        ];


        $tracks = $user->tracks()->with('album')->latest()->take(7)->get();
        $albums = $user->albums()->with('tracks')->latest()->get();

        return view('listner.artistProfile', compact('user', 'tracks', 'albums', 'randomContent'));
    }

    public function showAlbumDetails(Album $album)
    {
        $album->load(['user', 'tracks']);
        return view('listner.albumDetails', compact('album'));
    }


    public function allSongs(Request $request)
    {
        $query = Track::with(['user', 'category'])
            ->withCount('likes');
    
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
    
        $songs = $query->orderBy('created_at', 'desc')
            ->paginate(24);
    
        $categories = Category::all();
    
        return view('listner.all-songs', compact('songs', 'categories'));
    }


}

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


        $hotContent = [
            'tracks' => Track::withCount('likes')
                ->orderByDesc('likes_count')
                ->take(3)
                ->get(),
            'albums' => Album::withCount('tracks')
                ->orderByDesc('created_at')
                ->take(3)
                ->get(),
            'artists' => User::where('role', 'artiste')
                ->withCount('followers')
                ->orderByDesc('followers_count')
                ->take(3)
                ->get()
        ];


        $categories = category::take(4)->get();

        return view('listner.index', compact('artists', 'albums', 'categories', 'trendingTracks', 'hotContent'));
    }

    public function showArtistProfile(User $user)
    {
        $tracks = $user->tracks()->with('album')->latest()->get();
        $albums = $user->albums()->with('tracks')->get();

        return view('listner.artistProfile', compact('user', 'tracks', 'albums'));
    }

    public function showAlbumDetails(Album $album)
    {
        $album->load(['user', 'tracks']);
        return view('listner.albumDetails', compact('album'));
    }


}

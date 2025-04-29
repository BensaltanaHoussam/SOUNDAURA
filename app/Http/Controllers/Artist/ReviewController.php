<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $albums = Album::where('user_id', auth()->id())
            ->with(['comments.user'])
            ->get();

        return view('artist.reviews', compact('albums'));
    }
}

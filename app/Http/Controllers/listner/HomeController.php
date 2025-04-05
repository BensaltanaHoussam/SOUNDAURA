<?php

namespace App\Http\Controllers\listner;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artists = User::where('role', 'artiste')
                      ->where('status', 'active')
                      ->take(6)
                      ->get();

        $albums = Album::with('user')
                      ->latest()
                      ->take(6)
                      ->get();

        $categories = category::take(4)->get();

        return view('listner.index', compact('artists', 'albums', 'categories'));
    }
}

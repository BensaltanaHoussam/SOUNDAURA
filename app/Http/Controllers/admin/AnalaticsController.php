<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\category;
use App\Models\Track;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AnalaticsController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_artists' => User::where('role', 'artiste')->count(),
            'total_tracks' => Track::count(),
            'total_albums' => Album::count(),

        ];

        return view('admin.adminAnalytics', compact('stats'));
    }
}

<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Track;
use DB;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $stats = [
            'followers_count' => $user->followers()->count(),


                    ];

        return view('artist.analytics', compact('stats'));
    }




}

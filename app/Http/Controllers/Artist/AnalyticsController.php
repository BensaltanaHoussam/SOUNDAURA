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
            'new_followers' => $user->followers()
                ->whereBetween('followers.created_at', [now()->subMonth(), now()])
                ->count(),
            'monthly_listeners' => $this->getMonthlyListeners(),

        ];

        return view('artist.analytics', compact('stats'));
    }



    private function getMonthlyListeners()
    {
        // This is a placeholder. Implement actual listener tracking
        return auth()->user()->tracks()
            ->withCount('likes')
            ->get()
            ->sum('likes_count');
    }




}

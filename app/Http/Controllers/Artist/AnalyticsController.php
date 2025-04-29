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
            'recent_activities' => $this->getRecentActivities(),

        ];

        return view('artist.analytics', compact('stats'));
    }



    private function getMonthlyListeners()
    {
        return auth()->user()->tracks()
            ->withCount(relations: 'likes')
            ->get()
            ->sum('likes_count');
    }





    private function getRecentActivities()
    {
        return collect([
            'new_likes' => DB::table('likes')
                ->join('tracks', 'likes.track_id', '=', 'tracks.id')
                ->where('tracks.user_id', auth()->id())
                ->whereBetween('likes.created_at', [now()->subDays(30), now()])
                ->count(),
        ]);
    }





}

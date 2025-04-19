<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Log;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        try {
            $query = $request->get('query');

            // Validate query length
            if (strlen($query) < 2) {
                return response()->json([
                    'tracks' => [],
                    'artists' => [],
                ]);
            }

            // Search tracks
            $tracks = Track::where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('features', 'like', "%{$query}%");
            })
                ->with('user')
                ->take(5)
                ->get();

            // Search artists
            $artists = User::where('role', 'artist')
                ->where('name', 'like', "%{$query}%")
                ->take(5)
                ->get();

            return response()->json([
                'tracks' => $tracks,
                'artists' => $artists
            ]);

        } catch (\Exception $e) {
            Log::error('Search error: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error occurred while searching',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
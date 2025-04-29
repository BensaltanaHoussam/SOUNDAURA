<!-- filepath: c:\laragon\www\SOUNDAURA\resources\views\artist\analytics.blade.php -->
@extends('layouts.dashboard')
@section('title', 'Analytics')
@section('content')

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Music Analytics</h2>
            <div class="text-sm text-gray-400">
                Last Updates :
            </div>
        </div>

        <!-- Overview Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

            <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-1">Followers</div>
                <div class="text-2xl font-bold">{{ number_format($stats['followers_count']) }}</div>
                <div
                    class="flex items-center {{ $stats['new_followers'] > 0 ? 'text-green-500' : 'text-gray-400' }} text-sm mt-2">
                    <i class="ri-user-add-line mr-1"></i>
                    +{{ number_format($stats['new_followers']) }} this month
                </div>
            </div>

            <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-1">Monthly Listeners</div>
                <div class="text-2xl font-bold">{{ number_format($stats['monthly_listeners']) }}</div>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                    <i class="ri-user-line mr-1"></i>
                    Unique listeners
                </div>
            </div>
            <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-1">Recent Activity</div>
                <div class="text-2xl font-bold">{{ number_format($stats['recent_activities']['new_likes']) }}</div>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                    <i class="ri-heart-line mr-1"></i>
                    New likes this month
                </div>
            </div>
            <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-6">
                <div class="text-gray-400 text-sm mb-1">Playlist Adds</div>
                <div class="text-2xl font-bold">{{ number_format($stats['recent_activities']['playlist_adds']) }}</div>
                <div class="flex items-center text-gray-400 text-sm mt-2">
                    <i class="ri-playlist-line mr-1"></i>
                    Times added to playlists
                </div>
            </div>
        </div>


        <div class="bg-zinc-900/50 border border-zinc-800 rounded-lg p-6 mb-6">
            <h3 class="text-lg font-bold mb-4">Top Tracks</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-400 border-b border-zinc-800">
                            <th class="pb-3 pl-2">TITLE</th>
                            <th class="pb-3">LIKES</th>
                            <th class="pb-3">PLAYLISTS</th>
                            <th class="pb-3">RELEASE DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['top_tracks'] as $track)
                            <tr class="border-b border-zinc-800 hover:bg-zinc-800/50">
                                <td class="py-4 pl-2">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-zinc-800 rounded overflow-hidden">
                                            <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="font-medium">{{ $track->title }}</div>
                                    </div>
                                </td>
                                <td class="text-gray-400">{{ number_format($track->likes_count) }}</td>
                                <td class="text-gray-400">{{ number_format($track->playlists_count) }}</td>
                                <td class="text-gray-400">{{ $track->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
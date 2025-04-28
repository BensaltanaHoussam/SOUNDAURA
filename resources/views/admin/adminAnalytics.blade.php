@extends('layouts.adminDash')
@section('title', 'Analytics Dashboard')
@section('content')
    <div class="p-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Analytics Dashboard</h1>
            <p class="text-gray-400">Track your platform's performance and growth</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Users -->
            <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Users</div>
                    <div class="bg-red-500/20 p-2 rounded-lg">
                        <i class="ri-user-line text-red-600"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-2">{{ number_format($stats['total_users']) }}</div>
                <div class="text-sm text-gray-400">Including {{ $stats['total_artists'] }} artists</div>
            </div>



            <!-- Total Tracks -->
            <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Tracks</div>
                    <div class="bg-red-500/20 p-2 rounded-lg">
                        <i class="ri-music-2-line text-red-500"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-2">{{ number_format($stats['total_tracks']) }}</div>
                <div class="text-sm text-gray-400">Across all categories</div>
            </div>

            <!-- Total Albums -->
            <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-gray-400">Total Albums</div>
                    <div class="bg-purple-500/20 p-2 rounded-lg">
                        <i class="ri-album-line text-purple-500"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-2">{{ number_format($stats['total_albums']) }}</div>
                <div class="text-sm text-gray-400">Released albums</div>
            </div>

        </div>




        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">


            <!-- Most Liked Tracks -->
            <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800">
                <h3 class="text-lg font-bold mb-6">Most Popular Tracks</h3>
                <div class="space-y-4">
                    @foreach($stats['most_liked_tracks'] as $track)
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                class="w-12 h-12 object-cover rounded">
                            <div class="flex-1">
                                <div class="text-sm font-medium">{{ $track->title }}</div>
                                <div class="text-xs text-gray-400">{{ $track->user->name }}</div>
                            </div>
                            <div class="flex items-center gap-1 text-red-500">
                                <i class="ri-heart-fill"></i>
                                <span class="text-sm">{{ number_format($track->likes_count) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-zinc-900/50 p-6 rounded-xl border border-zinc-800">
                <h3 class="text-lg font-bold mb-6">Recent Activity</h3>
                <div class="space-y-4">
                    @foreach($stats['recent_activities'] as $activity)
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center">
                                <i class="ri-music-2-line text-red-500"></i>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium">{{ $activity->user->name }} uploaded "{{ $activity->title }}"
                                </div>
                                <div class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection
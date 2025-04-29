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




        </div>


    </div>

@endsection
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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

        </div>

    </div>

@endsection
@extends('layouts.app')
@section('title', 'My Favorites')
@section('content')
<div class="bg-black text-white min-h-screen p-12">
    <!-- Header -->
    <div class="flex gap-4 mb-6">
        <div class="w-48 flex-shrink-0">
            <div class="w-full aspect-square bg-gradient-to-br from-red-600 to-red-900 rounded flex items-center justify-center">
                <i class="ri-heart-fill text-6xl"></i>
            </div>
        </div>
        <div>
            <h1 class="text-2xl font-bold mb-1">My Favorites</h1>
            <div class="text-red-500 text-sm mb-2">Favorite Tracks</div>
            <div class="mt-4 flex items-center gap-4">
                <span class="text-sm text-gray-400">{{ $favoriteTracks->count() }} tracks</span>
            </div>
        </div>
    </div>

    <!-- Tracklist -->
    <div class="border border-gray-800 rounded-lg overflow-hidden mb-8">
        <div class="divide-y divide-gray-800">
            @foreach($favoriteTracks as $track)
                <div class="flex items-center p-3 hover:bg-gray-500/20 group">
                    <div class="flex-1 flex items-center cursor-pointer"
                        onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ $track->user->name }}', '{{ asset('storage/' . $track->cover_image) }}')">
                        <div class="w-10 h-10 mr-3">
                            <img src="{{ asset('storage/' . $track->cover_image) }}" 
                                 alt="{{ $track->title }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <p class="font-medium">{{ $track->title }}</p>
                            <p class="text-xs text-gray-400">{{ $track->user->name }}</p>
                        </div>
                    </div>
                    
                    <!-- Remove from Favorites Button -->
                    <form action="{{ route('listner.favorites.toggle') }}" method="POST" class="px-4">
                        @csrf
                        <input type="hidden" name="track_id" value="{{ $track->id }}">
                        <button type="submit" class="text-red-500 hover:text-red-400 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-heart-fill"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function playTrack(audioUrl, title, artist, coverImage) {
        window.dispatchEvent(new CustomEvent('play-track', {
            detail: {
                url: audioUrl,
                title: title,
                artist: artist,
                cover: coverImage
            }
        }));
    }
</script>
@endsection
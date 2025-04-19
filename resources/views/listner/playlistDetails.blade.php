@extends('layouts.app')
@section('title', $playlist->title)
@section('content')
    <div class="bg-black text-white p-12">
        <!-- Playlist Header -->
        <div class="flex gap-4 mb-6">
            <div class="w-60 flex-shrink-0">
                <img src="{{ $playlist->cover_image ? asset('storage/' . $playlist->cover_image) : asset('assets/img/default-playlist.jpg') }}" 
                     alt="{{ $playlist->title }}"
                     class="w-full h-full object-cover">
            </div>
            <div>
                <div class="flex items-center gap-2 text-gray-400 text-sm mb-1">
                    <i class="fas fa-user-circle"></i>
                    <span>{{ $playlist->user->name }}</span>
                </div>
                <h1 class="text-2xl font-bold mb-1">{{ $playlist->title }}</h1>
                <div class="text-red-500 text-sm mb-2">PLAYLIST</div>
                <p class="text-gray-300 text-sm">
                    {{ $playlist->description }}
                </p>
                <div class="mt-4 flex items-center gap-4">
                    <span class="text-sm text-gray-400">{{ $playlist->tracks->count() }} tracks</span>
                </div>
            </div>
        </div>

        <!-- Tracklist -->
        <div class="border border-gray-800 rounded-lg overflow-hidden mb-8">
            <div class="divide-y divide-gray-800">
                @foreach($playlist->tracks as $track)
                    <div class="flex items-center p-3 hover:bg-gray-900">
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
                            <div class="flex items-center gap-3">
                                <button class="text-gray-400 hover:text-white">
                                    <i class="ri-play-fill"></i>
                                </button>
                            </div>
                        </div>
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
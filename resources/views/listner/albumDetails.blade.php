@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')





    <div class="bg-black text-white p-12">
        <!-- Album Header -->
        <div class="flex gap-4 mb-6 ">
            <div class="w-60 flex-shrink-0">
                <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                    class="w-full h-full object-cover">
            </div>
            <div>
                <div class="flex items-center gap-2 text-gray-400 text-sm mb-1">
                    <i class="fas fa-user-circle"></i>
                    <span>{{ $album->user->name }}</span>
                </div>
                <h1 class="text-2xl font-bold mb-1">{{ $album->title }}</h1>
                <div class="text-red-500 text-sm mb-2">ALBUM</div>
                <p class="text-gray-300 text-sm">
                    {{ $album->description }}
                </p>
                <div class="mt-4 flex items-center gap-4">
                    <span class="text-sm text-gray-400">{{ $album->tracks->count() }} tracks - {{ $album->created_at->format('Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Tracklist -->
        <div class="border border-red-600 rounded-lg overflow-hidden mb-8">
            <div class="divide-y divide-gray-800">
                @foreach($album->tracks as $track)
                    <div class="flex items-center p-3 hover:bg-gray-900"
                        onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ $album->user->name }}', '{{ asset('storage/' . $track->cover_image) }}')">
                        <div class="w-10 h-10 mr-3">
                            <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow">
                            <p class="font-medium">{{ $track->title }}</p>
                            <p class="text-xs text-gray-400">{{ $track->features ?: $album->user->name }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-gray-400">2000</span>
                            <button class="text-gray-400 hover:text-white">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mb-20">
            <h2 class="text-xl font-bold mb-4">Comments</h2>

            <!-- Comment 1 -->
            <div class="border border-red-900 rounded-lg p-4 mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="font-bold">Houssam Bensaltana</span>
                </div>
                <input type="text" placeholder="Share your thoughts..."
                    class="text-sm text-gray-300 mb-3 p-2 w-full bg-transparent border-b border-gray-500 focus:outline-none focus:border-red-600" />
                <div class="flex justify-end">
                    <button class="bg-red-600 text-white px-4 py-1 rounded text-sm">Submit</button>
                </div>
            </div>


            <!-- Comment 2 -->
            <div class="border border-gray-800 rounded-lg p-4 mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded-full bg-gray-700 flex items-center justify-center text-xs">S</div>
                    <span class="font-bold">Lebron james</span>
                </div>
                <p class="text-sm text-gray-300">
                    I love this album! It's on repeat every day. The beats are incredible, and the lyrics really resonate
                    with me. Each track has its own unique vibe, and I can't get enough of it. This album is definitely one
                    of the best releases this year. Highly recommended to anyone who appreciates good music!
                </p>
            </div>

            <!-- Comment 3 -->
            <div class="border border-gray-800 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded-full bg-red-700 flex items-center justify-center text-xs">N</div>
                    <span class="font-bold">Niz</span>
                </div>
                <p class="text-sm text-gray-300">
                    This album is fire! Yeat really outdid himself with this one. The production is top-notch and the lyrics
                    are on point. Every track brings something new to the table. Can't stop listening to it!
                </p>
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
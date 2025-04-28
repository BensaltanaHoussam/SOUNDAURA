@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')





    <div class="bg-black text-white h-full p-12">
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
                    <span class="text-sm text-gray-400">{{ $album->tracks->count() }} tracks -
                        {{ $album->created_at->format('Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Tracklist -->
        <div class="border border-gray-800 rounded-lg overflow-hidden mb-8">
            <div class="divide-y divide-gray-800">
                @foreach($album->tracks as $track)
                    <div class="flex items-center p-3 hover:bg-gray-500/20"
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

                        <!-- Add to Playlist Button -->
                        <div class="ml-4 flex items-center" @click.stop>
                            <x-add-to-playlist-button :trackId="$track->id" />
                                <x-like-button :track="$track" />
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mb-20">
            <h2 class="text-xl font-bold mb-4">Comments</h2>

            <!-- Comment Form -->
            <div class="border border-red-900 rounded-lg p-4 mb-4">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="album_id" value="{{ $album->id }}">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="font-bold">{{ auth()->user()->name }}</span>
                    </div>
                    <input type="text" name="content" placeholder="Share your thoughts..."
                        class="text-sm text-gray-300 mb-3 p-2 w-full bg-transparent border-b border-gray-500 focus:outline-none focus:border-red-600"
                        required />
                    <div class="flex justify-end">
                        <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded text-sm">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Comments List -->
            @foreach($album->comments()->orderBy('created_at', 'desc')->get() as $comment)
                <div class="border border-gray-800 rounded-lg p-4 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        @if($comment->user->profilePicture)
                            <img src="{{ asset('storage/' . $comment->user->profilePicture) }}" alt="{{ $comment->user->name }}"
                                class="w-8 h-8 rounded-full object-cover">
                        @else
                            <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center text-xs">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                        @endif
                        <span class="font-bold">{{ $comment->user->name }}</span>
                    </div>
                    <p class="text-sm text-gray-300">
                        {{ $comment->content }}
                    </p>
                </div>
            @endforeach
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
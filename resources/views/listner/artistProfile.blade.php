@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')


    <div class="bg-black text-white h-screen">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-12">
            <div class="w-full md:w-2/5 flex flex-col pt-8 gap-4">
                <!-- Artist Profile -->
                <div class="flex gap-4 items-start">
                    <div class="w-32 h-32 rounded-full overflow-hidden flex-shrink-0">
                        <img src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : asset('assets/img/profile.jpg') }}"
                            alt="{{ $user->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                        <div class="flex items-center gap-1 mb-2">
                            <span class="text-gray-400 text-sm">199000</span>

                        </div>
                        <p class="text-gray-300 text-sm">
                            {{ $user->bio ?? ' ' }}
                        </p>
                    </div>
                </div>

                <!-- Tracklist Section -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden border border-gray-800">


                    <!-- Track List -->
                    <div class="divide-y divide-gray-800">
                        @foreach($tracks as $track)
                            <div class="flex items-center p-2 hover:bg-gray-800"
                                onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ $user->name }}', '{{ asset('storage/' . $track->cover_image) }}')">
                                <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                    class="w-10 h-10 object-cover mr-3">
                                <div class="flex-grow">
                                    <p class="text-sm">{{ $track->title }}</p>
                                    <p class="text-xs text-gray-400">{{ $track->features ?: $user->name }}</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs text-red-500">23888</span>
                                    <button class="text-gray-400 hover:text-white">
                                        <i class="fas fa-play"></i>
                                    </button>
                                </div>
                                <x-add-to-playlist-button :trackId="$track->id" />

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Section: Albums Grid -->
            <div class="w-full md:w-[550px]">
                <div class="grid grid-cols-2 gap-4">
                    @foreach($albums as $album)
                        <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden">

                            <a href="{{ route('listner.album.details', ['album' => $album->id]) }}">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                                        class="w-full aspect-square object-cover">
                                    <div
                                        class="absolute bottom-3 right-3 w-8 h-8 bg-black hover:bg-red-600 transition duration-200 cursor-pointer rounded-full flex items-center justify-center">
                                        <i class="ri-play-fill"></i>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-bold">{{ $album->title }}</h3>
                                    <p class="text-xs text-gray-400">Album • {{ $album->tracks_count ?? 0 }} tracks</p>
                                </div>
                            </a>


                        </div>
                    @endforeach
                </div>
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
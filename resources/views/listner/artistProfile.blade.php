@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')


    <div class="bg-black text-white pt-4">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-16">
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
                            <span class="text-gray-400 text-sm">{{ $user->followers()->count() }} followers</span>
                        </div>
                        <p class="text-gray-300 text-sm mb-4">
                            {{ $user->bio ?? ' ' }}
                        </p>

                        @auth
                            @if(auth()->id() !== $user->id)
                                <x-follow :user="$user" />
                            @endif
                        @endauth

                    </div>
                </div>

                <!-- Tracklist Section -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden border border-gray-800">


                    <!-- Track List -->
                    <div class="divide-y divide-gray-800">
                        @foreach($tracks as $track)
                            <div class="flex items-center p-2 hover:bg-gray-500/20">
                                <!-- Play Track Area -->
                                <div class="flex-1 flex items-center cursor-pointer"
                                    onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ $user->name }}', '{{ asset('storage/' . $track->cover_image) }}')">
                                    <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                        class="w-10 h-10 object-cover mr-3">
                                    <div class="flex-grow">
                                        <p class="text-sm">{{ $track->title }}</p>
                                        <p class="text-xs text-gray-400">{{ $track->features ?: $user->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <span class="text-xs text-red-500">23888</span>
                                    </div>
                                </div>



                                <!-- Add to Playlist Button -->
                                <div class="ml-4 flex items-center  " @click.stop>
                                    <x-add-to-playlist-button :trackId="$track->id" />
                                    <x-like-button :track="$track" />
                                </div>
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


    <section class="py-12 px-4 md:px-8 bg-black border-t border-gray-900">
        <div class="container mx-auto px-6">
            <!-- Random Tracks -->
            <div class="mb-12">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        Recommended Picks
                        <span class="px-2 py-1 text-xs bg-red-600/20 text-red-500 rounded-full">Shuffle Play</span>
                    </h2>
                    <button onclick="window.location.reload()" class="text-red-600 hover:text-red-500 transition-colors">
                        <i class="ri-shuffle-line text-xl"></i>
                    </button>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach($randomContent['tracks'] as $track)
                        <div class="group">
                            <!-- Track Cover -->
                            <div
                                class="relative aspect-square mb-3 bg-zinc-900 border border-zinc-800 rounded-md overflow-hidden shadow-lg">
                                <!-- Cover Image -->
                                <img src="{{ asset('storage/' . $track->cover_image) }}" alt="{{ $track->title }}"
                                    class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110 group-hover:brightness-75">

                                <!-- Gradient Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-b from-transparent to-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>

                                <!-- Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <button
                                        onclick="playTrack('{{ asset('storage/' . $track->audio_file) }}', '{{ $track->title }}', '{{ $track->user->name }}', '{{ asset('storage/' . $track->cover_image) }}')"
                                        class=" bg-red-600 w-4 h-4 rounded-full flex items-center justify-center transform scale-75 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 hover:bg-red-700 shadow-lg">
                                        <i class="ri-play-circle-fill text-4xl"></i>
                                    </button>
                                </div>

                                <!-- Duration Badge (if available) -->
                                @if(isset($track->duration))
                                    <div
                                        class="absolute bottom-2 right-2 bg-black/60 backdrop-blur-sm text-white text-xs px-2 py-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        {{ $track->duration }}
                                    </div>
                                @endif
                            </div>

                            <!-- Track Info -->
                            <div class="px-1">
                                <h3 class="text-white font-medium text-sm truncate group-hover:text-red-500 transition-colors">
                                    {{ $track->title }}
                                </h3>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-zinc-400 text-xs truncate">{{ $track->user->name }}</span>
                                    <x-like-button :track="$track" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Random Albums -->
            <div class="mt-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2">
                        Recommended Albums
                        <span class="px-2 py-1 text-xs bg-purple-600/20 text-purple-500 rounded-full">Discover</span>
                    </h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($randomContent['albums'] as $album)
                        <a href="{{ route('listner.album.details', ['album' => $album->id]) }}" class="group">
                            <div class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
                                <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                                    class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <div class="absolute bottom-3 left-3">
                                        <h3 class="text-white font-medium">{{ $album->title }}</h3>
                                        <p class="text-gray-300 text-sm">{{ $album->tracks_count }} tracks</p>
                                    </div>
                                </div>
                            </div>

                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>





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
@extends('layouts.app')
@section('title', 'Home')
@section('content')



    <!-- Top Artists Section -->
    <section class="py-12 px-4  md:px-8 bg-black">
        <div class=" mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    Aura Artists
                    <span class="pr-1"></span>
                    <i class="ri-fire-line text-red-500 font-extralight"></i>
                </h2>
                <a href="#" class="text-red-600 text-sm font-medium hover:text-red-500 transition-colors flex items-center">
                    See more
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Artists Grid -->
            <div class="grid grid-cols-3  md:grid-cols-4 lg:grid-cols-7 gap-4">
                <!-- For Artists -->
                @foreach($artists as $artist)
                    <a href="{{ route('listner.artist.profile', ['user' => $artist->id]) }}" class="group">
                        <div
                            class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ $artist->profilePicture ? asset('storage/' . $artist->profilePicture) : asset('assets/img/profile.jpg') }}"
                                alt="{{ $artist->name }}"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">{{ $artist->name }}</h3>
                            <p class="text-gray-400 text-xs">{{ $artist->tracks_count ?? 0 }} Tracks</p>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </section>



    <!-- Trending Tracks Grid -->
    <section class="py-12 px-4 md:px-16 bg-black">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-white">Aura songs</h2>
                <span class="px-2 py-0.5 text-xs font-medium bg-red-600/20 text-red-500 rounded-full">6</span>
            </div>

            <a href="{{ route('listner.all-songs') }}"
                class="group flex items-center gap-1 text-red-600 text-sm font-medium hover:text-red-500 transition-colors">
                <span>See more</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 transform transition-transform group-hover:translate-x-0.5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <!-- Tracks Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach($trendingTracks as $track)
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

        <!-- Empty State (if no tracks) -->
        @if(count($trendingTracks) === 0)
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <svg class="w-16 h-16 text-zinc-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                </svg>
                <h3 class="text-lg font-medium text-white">No tracks available</h3>
                <p class="text-zinc-400 text-sm mt-1">Check back later for new music</p>
            </div>
        @endif
    </section>


    <!-- Top Albums Section -->
    <section class="py-12 px-4  md:px-8 bg-black">
        <div class=" mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    Aura Albums
                    <span class="ml-2 text-sm text-red-600">6</span>
                </h2>
                <a href="#" class="text-red-600 text-sm font-medium hover:text-red-500 transition-colors flex items-center">
                    See more
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- album Grid -->
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($albums as $album)
                    <a href="{{ route('listner.album.details', ['album' => $album->id]) }}" class="group">
                        <div class="h-[208px] overflow-hidden mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">{{ $album->title }}</h3>
                            <p class="text-gray-400 text-xs">{{ $album->tracks_count ?? 0 }} <span
                                    class="text-red-600">Aura</span></p>
                        </div>
                    </a>
                @endforeach
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
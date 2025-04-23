@extends('layouts.app')
@section('title', 'Home')
@section('content')



    <!-- Top Artists Section -->
    <section class="py-12 px-4  md:px-8 bg-black">
        <div class=" mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    Top Artists
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

            <!-- Artists Grid -->
            <div class="grid grid-cols-3  md:grid-cols-4 lg:grid-cols-7 gap-4">


                <!-- Artist 2 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/kaynewest.avif') }}" alt="Artist 2"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Kayne west</h3>
                        <p class="text-gray-400 text-xs">189K Followers</p>
                    </div>
                </div>

                <!-- Artist 3 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/kenCarson.avif') }}" alt="Artist 3"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Ken Carson</h3>
                        <p class="text-gray-400 text-xs">222K Followers</p>
                    </div>
                </div>

                <!-- Artist 4 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/yeat.webp') }}" alt="Artist 4"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Yeat</h3>
                        <p class="text-gray-400 text-xs">152K Followers</p>
                    </div>
                </div>



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


                <!-- Artist 2 -->
                <div class="group">
                    <div class="relative overflow-hidden  aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/lyfe.webp') }}" alt="Artist 2"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Lyfe</h3>
                        <p class="text-gray-400 text-xs">189 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

                <!-- Artist 3 -->
                <div class="group">
                    <div class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/spili.jpg') }}" alt="Artist 3"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">if looks could kill</h3>
                        <p class="text-gray-400 text-xs">222 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

                <!-- Artist 4 -->
                <div class="group">
                    <div class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/yezus.jpg') }}" alt="Artist 4"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Yeezus</h3>
                        <p class="text-gray-400 text-xs">152 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

                <!-- Artist 5 -->
                <div class="group">
                    <div class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/ChopSuey.webp') }}" alt="Artist 5"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Pink Tape</h3>
                        <p class="text-gray-400 text-xs">201 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

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




    <!-- Categories Section -->
    <section class="py-12 px-4  md:px-8 bg-black border-t border-gray-900">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    Categories
                    <span class="ml-2 text-sm text-red-600">5</span>
                </h2>
                <a href="#" class="text-red-600 text-sm font-medium hover:text-red-500 transition-colors flex items-center">
                    See more
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Categories Slider -->
            <div class="relative">
                <div class="overflow-hidden">
                    <div class="flex space-x-4 pb-4">

                        <!-- Category -->
                        @foreach($categories as $category)
                            <div class="group min-w-[200px] md:min-w-[250px] flex-shrink-0">
                                <div class="relative overflow-hidden rounded-lg aspect-video mb-3 bg-gray-900">
                                    <img src="{{ asset('assets/img/rage.jpeg') }}" alt="Rap Battles"
                                        class="w-[300px]  h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <h3 class="text-white font-bold text-lg">{{ $category->name }}</h3>
                                        <p class="text-gray-300 text-sm">Rage Electronics tracks</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Pagination dots -->
                <div class="flex justify-center mt-6 space-x-2">
                    <button class="w-8 h-2 rounded-full bg-gray-700"></button>
                    <button class="w-8 h-2 rounded-full bg-gray-700"></button>
                    <button class="w-8 h-2 rounded-full bg-red-600"></button>
                    <button class="w-8 h-2 rounded-full bg-gray-700"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending Tracks Grid -->
    <section class="py-12 px-4 md:px-8 bg-black">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <h2 class="text-2xl font-bold text-white">Aura songs</h2>
                <span class="px-2 py-0.5 text-xs font-medium bg-red-600/20 text-red-500 rounded-full">6</span>
            </div>

            <a href="#"
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
                            {{ $track->title }}</h3>
                        <div class="flex items-center justify-between mt-1">
                            <span class="text-zinc-400 text-xs truncate">{{ $track->user->name }}</span>
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                </svg>
                                <span class="text-zinc-400 text-xs">{{ $track->likes_count ?? 0 }}</span>
                            </div>
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








@endsection
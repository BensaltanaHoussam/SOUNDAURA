@extends('layouts.app')
@section('title', 'All Songs')
@section('content')
    <div class="bg-black min-h-screen py-12 px-4 md:px-8">
        <div class="container mx-auto px-6">

            <div class="mb-8 flex flex-wrap gap-3">
                <a href="{{ route('listner.all-songs') }}"
                    class="px-4 py-2 rounded-full text-sm {{ !request('category') ? 'bg-red-600 text-white' : 'bg-zinc-800/50 text-gray-300 hover:bg-zinc-800' }} transition-colors">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('listner.all-songs', ['category' => $category->id]) }}"
                        class="px-4 py-2 rounded-full text-sm {{ request('category') == $category->id ? 'bg-red-600 text-white' : 'bg-zinc-800/50 text-gray-300 hover:bg-zinc-800' }} transition-colors">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>



            <!-- Songs Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
                @foreach($songs as $track)
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
                                    class="bg-red-600 w-12 h-12 rounded-full flex items-center justify-center transform scale-75 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300 hover:bg-red-700 shadow-lg">
                                    <i class="ri-play-fill text-2xl text-white"></i>
                                </button>
                            </div>

                            <!-- Duration Badge -->
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
                                <div class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                    </svg>
                                    <span class="text-zinc-400 text-xs">{{ $track->likes_count }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $songs->links() }}
            </div>
        </div>
    </div>
@endsection
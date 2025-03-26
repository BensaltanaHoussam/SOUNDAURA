@extends('layouts.app')
@section('title', 'Home')
@section('content')





    <!-- Top Albums Section -->
    <section class="py-12 px-4  md:px-8 h-screen bg-black">
        <div class=" mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    My playlists
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
                <!-- album 1 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden  mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/wlr.webp') }}" alt="Artist 1"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Whole Lotta Red</h3>
                        <p class="text-gray-400 text-xs">165 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

                <!-- Artist 2 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden  aspect-square mb-3 bg-gray-900 border border-gray-800">
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
                    <div
                        class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
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
                    <div
                        class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
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
                    <div
                        class="relative overflow-hidden aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/ChopSuey.webp') }}" alt="Artist 5"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">Pink Tape</h3>
                        <p class="text-gray-400 text-xs">201 <span class="text-red-600">aura</span></p>
                    </div>
                </div>

                <!-- Artist 6 -->
                <div class="group">
                    <div
                        class="relative overflow-hidden  aspect-square mb-3 bg-gray-900 border border-gray-800">
                        <img src="{{ asset('assets/img/xxxxxx.webp') }}" alt="Artist 6"
                            class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                    </div>
                    <div class="text-center">
                        <h3 class="text-white font-medium text-sm">?</h3>
                        <p class="text-gray-400 text-xs">175 <span class="text-red-600">aura</span> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>




 






@endsection
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
                    <a href="#"
                        class="text-red-600 text-sm font-medium hover:text-red-500 transition-colors flex items-center">
                        See more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Artists Grid -->
                <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <!-- Artist 1 -->
                    <div class="group">
                        <div
                            class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ asset('assets/img/destroy.jpg') }}" alt="Artist 1"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">Destroy Lonely</h3>
                            <p class="text-gray-400 text-xs">165K Followers</p>
                        </div>
                    </div>

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

                    <!-- Artist 5 -->
                    <div class="group">
                        <div
                            class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ asset('assets/img/playboi.jpg') }}" alt="Artist 5"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">Playboi Carti</h3>
                            <p class="text-gray-400 text-xs">201K Followers</p>
                        </div>
                    </div>

                    <!-- Artist 6 -->
                    <div class="group">
                        <div
                            class="relative overflow-hidden rounded-full aspect-square mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ asset('assets/img/ossamason.jpg') }}" alt="Artist 6"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">ossamason</h3>
                            <p class="text-gray-400 text-xs">175K Followers</p>
                        </div>
                    </div>
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
                    <a href="#"
                        class="text-red-600 text-sm font-medium hover:text-red-500 transition-colors flex items-center">
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
                            <!-- Category 1 -->
                            <div class="group min-w-[200px] md:min-w-[250px] flex-shrink-0">
                                <div class="relative overflow-hidden rounded-lg aspect-video mb-3 bg-gray-900">
                                    <img src="{{ asset('assets/img/hipHop.jpg') }}" alt="Hip Hop"
                                        class="w-[300px] h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <h3 class="text-white font-bold text-lg">Hip Hop</h3>
                                        <p class="text-gray-300 text-sm">Best hip hop tracks of the year</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Category 2 -->
                            <div class="group min-w-[200px] md:min-w-[250px] flex-shrink-0">
                                <div class="relative overflow-hidden rounded-lg aspect-video mb-3 bg-gray-900">
                                    <img src="{{ asset('assets/img/chill.jpg') }}" alt="Beats & Loops"
                                        class="w-[300px]  h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <h3 class="text-white font-bold text-lg">Trap</h3>
                                        <p class="text-gray-300 text-sm">Trap tracks</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Category 3 -->
                            <div class="group min-w-[200px] md:min-w-[250px] flex-shrink-0">
                                <div class="relative overflow-hidden rounded-lg aspect-video mb-3 bg-gray-900">
                                    <img src="{{ asset('assets/img/underground.jpg') }}" alt="Underground"
                                        class="w-[300px]  h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <h3 class="text-white font-bold text-lg">Underground</h3>
                                        <p class="text-gray-300 text-sm">Discover hidden gems</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Category 4 -->
                            <div class="group min-w-[200px] md:min-w-[250px] flex-shrink-0">
                                <div class="relative overflow-hidden rounded-lg aspect-video mb-3 bg-gray-900">
                                    <img src="{{ asset('assets/img/rage.jpeg') }}" alt="Rap Battles"
                                        class="w-[300px]  h-full object-cover transition-transform group-hover:scale-110 duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 p-4">
                                        <h3 class="text-white font-bold text-lg">Rage</h3>
                                        <p class="text-gray-300 text-sm">Rage Electronics tracks</p>
                                    </div>
                                </div>
                            </div>

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

 




@endsection
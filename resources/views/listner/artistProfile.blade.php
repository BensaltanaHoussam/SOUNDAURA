@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')


<div class="bg-black text-white h-screen">     <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-12">
        <div class="w-full md:w-2/5 flex flex-col pt-8 gap-4">
            <!-- Artist Profile -->
            <div class="flex gap-4 items-start">
                <div class="w-32 h-32 rounded-full overflow-hidden flex-shrink-0">
                    <img src="{{ asset('assets/img/yeat.webp') }}" alt="Yeat profile" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">Yeat</h1>
                    <div class="flex items-center gap-1 mb-2">
                        <span class="text-gray-400 text-sm">199000</span>
                       
                    </div>
                    <p class="text-gray-300 text-sm">
                        traded his earlier baby cadences for a more aggressive, hard-hitting vocal performance. Harris describes Carti's approach as one that continues with his "signature unearthly sound" while opting out of
                    </p>
                </div>
            </div>

            <!-- Tracklist Section -->
            <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden border border-gray-800">
       

                <!-- Track List -->
                <div class="divide-y divide-gray-800">
                    <!-- Track 1 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">1</div>
                        <img src="{{ asset('assets/img/afterLyfe.jpg') }}" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">Better Off</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">74723</span>
                            <span class="text-xs text-gray-400">3:50</span>
                        </div>
                    </div>

                    <!-- Track 2 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">2</div>
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">If we being real</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">50000</span>
                            <span class="text-xs text-gray-400">2:52</span>
                        </div>
                    </div>

                    <!-- Track 3 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">3</div>
                        <img src="{{ asset('assets/img/lyfestyle.jpg') }}"" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">Lying 5 Fun</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">30200</span>
                            <span class="text-xs text-gray-400">3:24</span>
                        </div>
                    </div>

                    <!-- Track 4 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">4</div>
                        <img src="{{ asset('assets/img/lyfe.webp') }}" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">Come on</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">23050</span>
                            <span class="text-xs text-gray-400">3:22</span>
                        </div>
                    </div>

                    <!-- Track 5 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">5</div>
                        <img src="{{ asset('assets/img/up2me.jpg') }}" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">Get Busy</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">14000</span>
                            <span class="text-xs text-gray-400">3:37</span>
                        </div>
                    </div>

                    <!-- Track 6 -->
                    <div class="flex items-center p-2 hover:bg-gray-800">
                        <div class="w-6 text-center text-gray-500 text-xs mr-2">6</div>
                        <img src="{{ asset('assets/img/2alive.jpg') }}" alt="Track thumbnail" class="w-10 h-10 object-cover mr-3">
                        <div class="flex-grow">
                            <p class="text-sm">Jus better</p>
                            <p class="text-xs text-gray-400">Yeat</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-red-500">3400</span>
                            <span class="text-xs text-gray-400">3:08</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section: Albums Grid -->
        <div class="w-full md:w-[550px]">
            <div class="grid grid-cols-2 gap-4  ">
                <!-- Album 1 -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/img/DKWJNX.jpg') }}" alt="2093 Album" class="w-full aspect-square object-cover">
                        <div class="absolute bottom-3 right-3 w-8 h-8 bg-black hover:bg-red-600 transition duration-200 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="ri-play-fill"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold">After Lyfe</h3>
                        <p class="text-xs text-gray-400">Album</p>
                    </div>
                </div>

                <!-- Album 2 -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="After Lyfe Album" class="w-full aspect-square object-cover">
                        <div class="absolute bottom-3 right-3 w-8 h-8 bg-black hover:bg-red-600 transition duration-200 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="ri-play-fill"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold">2093</h3>
                        <p class="text-xs text-gray-400">Album</p>
                    </div>
                </div>

                <!-- Album 3 -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/img/afterLyfe.jpg') }}" alt="UP 2 ME Album" class="w-full aspect-square object-cover">
                        <div class="absolute bottom-3 right-3 w-8 h-8 bg-black hover:bg-red-600 transition duration-200 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="ri-play-fill"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold">After Lyfe</h3>
                        <p class="text-xs text-gray-400">Album</p>
                    </div>
                </div>

                <!-- Album 4 -->
                <div class="bg-gray-900 bg-opacity-30 rounded-lg overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('assets/img/lyfe.webp') }}" alt="Lyfe Album" class="w-full aspect-square object-cover">
                        <div class="absolute bottom-3 right-3 w-8 h-8 bg-black hover:bg-red-600 transition duration-200 cursor-pointer rounded-full flex items-center justify-center">
                            <i class="ri-play-fill"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="font-bold">Lyfe</h3>
                        <p class="text-xs text-gray-400">Album</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
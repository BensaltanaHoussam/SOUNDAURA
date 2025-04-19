@extends('layouts.visitor')
@section('title', 'Welcome')
@section('content')


    <section class="hero-section relative overflow-hidden bg-black text-white">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-[300px] -right-[300px] w-[600px] h-[600px] bg-red-600 rounded-full opacity-10 blur-3xl">
            </div>
            <div
                class="absolute -bottom-[200px] -left-[200px] w-[400px] h-[400px] bg-red-600 rounded-full opacity-10 blur-3xl">
            </div>
            <div class="absolute top-[10%] left-[20%] w-[10px] h-[10px] bg-red-500 rounded-full"></div>
            <div class="absolute top-[30%] right-[30%] w-[15px] h-[15px] bg-red-500 rounded-full"></div>
            <div class="absolute bottom-[20%] left-[40%] w-[8px] h-[8px] bg-red-500 rounded-full"></div>
            <div class="absolute top-[70%] right-[10%] w-[12px] h-[12px] bg-red-500 rounded-full"></div>

            <!-- Animated Waveform -->
            <div class="absolute bottom-0 left-0 right-0 h-[100px] opacity-20">
                <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                    <path fill="#ff0000" fill-opacity="1"
                        d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
                        class="wave-animation"></path>
                </svg>
            </div>
        </div>

        <!-- Content Container -->
        <div class="mx-auto px-8 lg:px-16 py-24 md:py-32 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div class="space-y-8">
                    <div>
                        <h1 class="text-5xl md:text-6xl font-bold mb-4 leading-tight">
                            <span class="block">Discover Your</span>
                            <span class="text-red-600">Sound Universe</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-300 mt-6">
                            Unleash the power of music with SoundAura's next-generation audio platform.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-8">
                        <a href="#"
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-full px-8 py-4 transition-all duration-300 shadow-lg hover:shadow-red-600/30">
                            Start Listening
                        </a>
                        <a href="#"
                            class="bg-black border border-red-600 text-white hover:bg-red-600/10 font-medium rounded-full px-8 py-4 transition-all duration-300">
                            Explore Artists
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-800">
                        <div>
                            <div class="text-3xl font-bold text-red-500">10M+</div>
                            <div class="text-sm text-gray-400">Tracks</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-red-500">2M+</div>
                            <div class="text-sm text-gray-400">Artists</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-red-500">140+</div>
                            <div class="text-sm text-gray-400">Countries</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Rectangular Image -->
                <div class="w-full h-auto pb-8">
                    <div class="w-full aspect-[16/14] shadow-white/50 shadow-2xl">
                        <img class="w-full h-full object-cover object-center"
                            src="{{ url('/assets/img/playboiHero.webp') }}" alt="SoundAura Hero">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <style>


    </style>




@endsection
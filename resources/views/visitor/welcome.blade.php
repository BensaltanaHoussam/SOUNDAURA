@extends('layouts.visitor')
@section('title', 'Welcome')
@section('content')





    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fadeInLeft {
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 200ms;
        }

        .delay-400 {
            animation-delay: 400ms;
        }

        .delay-600 {
            animation-delay: 600ms;
        }
    </style>


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
        <div class="mx-auto px-8 lg:px-16 py-24 md:py-16 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Column - Text Content -->
                <div class="space-y-8">
                    <div>
                        <h1 class="text-5xl md:text-6xl font-bold mb-4 leading-tight">
                            <span class="block animate-fadeInLeft">Discover Your</span>
                            <span class="text-red-600 block animate-fadeInLeft delay-200">Sound Universe</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-300 mt-6 animate-fadeInLeft delay-400">
                            Unleash the power of music with SoundAura's next-generation audio platform.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-8 animate-fadeInUp delay-400">
                        <a href="{{ route('login') }}"
                            class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-full px-8 py-4 transition-all duration-300 shadow-lg hover:shadow-red-600/30">
                            Start Listening
                        </a>
                        <a href="#"
                            class="bg-black border border-red-600 text-white hover:bg-red-600/10 font-medium rounded-full px-8 py-4 transition-all duration-300">
                            Explore Artists
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-800 animate-fadeInUp delay-600">
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
                <div class="w-full h-auto animate-fadeInUp">
                    <div class="w-full aspect-[16/14] shadow-white/30 shadow-2xl">
                        <img class="w-full h-full object-cover rounded-2xl object-center"
                            src="{{ url('/assets/img/playboiHero.webp') }}" alt="SoundAura Hero">
                    </div>
                </div>
            </div>
        </div>

    </section>




    <!-- About Section -->
    <section class="py-24 bg-white border border-b-black relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-[10%] right-[5%] w-[8px] h-[8px] bg-red-500 rounded-full opacity-30"></div>
            <div class="absolute top-[30%] left-[10%] w-[12px] h-[12px] bg-red-500 rounded-full opacity-30"></div>
            <div class="absolute bottom-[15%] right-[20%] w-[10px] h-[10px] bg-red-500 rounded-full opacity-30"></div>

            <!-- Subtle Background Shape -->
            <div class="absolute -left-[300px] top-[20%] w-[600px] h-[600px] bg-red-600 rounded-full opacity-[0.03]"></div>
        </div>

        <!-- Content Container -->
        <div class="container mx-auto px-8 lg:px-16 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Left Column - Image -->
                <div class="relative">
                    <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ url('/assets/img/trippiereddcover.webp') }}" alt="SoundAura Studio"
                            class="w-full h-auto object-cover" />
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-red-600 rounded-2xl opacity-20 blur-md"></div>
                    <div class="absolute -top-6 -left-6 w-32 h-32 border-2 border-red-500 rounded-2xl opacity-20"></div>
                </div>

                <!-- Right Column - Content -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-sm font-semibold text-red-600 uppercase tracking-wider">About SoundAura</h2>
                        <h3 class="mt-2 text-4xl md:text-5xl font-bold text-black leading-tight">Redefining The Music
                            Experience</h3>
                    </div>

                    <p class="text-gray-700 text-lg">
                        Founded in 2025, SoundAura is revolutionizing how people discover, experience, and connect through
                        music. Our platform combines cutting-edge technology with a passion for musical artistry to create
                        an unparalleled listening experience.
                    </p>

                    <!-- Feature Highlights -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                        <!-- Feature 1 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">You can be an artist</h4>
                                <p class="text-gray-600 mt-1">Personalized recommendations that evolve with your taste.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">HD Audio Quality</h4>
                                <p class="text-gray-600 mt-1">Experience music in studio-quality sound with no compression.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Artist Community</h4>
                                <p class="text-gray-600 mt-1">Connect directly with your favorite artists and fellow fans.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z"
                                            clip-rule="evenodd" />
                                        <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-black">Exclusive Content</h4>
                                <p class="text-gray-600 mt-1">Access to limited releases, behind-the-scenes and more.</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-6">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-full transition-all duration-300 shadow-lg hover:shadow-red-600/30">
                            Join SoundAura
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Artist Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-8 lg:px-16">


            <div class=" mb-16">
                <h2 class="text-4xl md:text-5xl font-light text-black">
                    <span class="text-red-600">°</span>
                    <span class="text-red-600 font-semibold">Aura</span> artists
                </h2>
                <p class="text-gray-600 mt-4  mx-auto">
                    Discover the talented artists that are making waves on SoundAura
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Artist 1 -->
                <div
                    class="group relative overflow-hidden  shadow-lg transition-all duration-300 hover:shadow-xl">
                    <!-- Artist Image -->
                    <div class="aspect-[3/4] w-full">
                        <img src="{{ url('/assets/img/playboi.jpg') }}" alt="Drake"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                    </div>

                    <!-- Hover Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3
                            class="text-xl font-bold text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            Playboi Carti</h3>
                        <p
                            class="text-red-500 font-medium translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                            Electronics/Rap</p>
                        <p
                            class="text-gray-300 text-sm mt-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150">
                            Chart-topping artist known for his versatile style and emotional lyrics.</p>
                    </div>
                </div>

                <!-- Artist 2 -->
                <div
                    class="group relative overflow-hidden  shadow-lg transition-all duration-300 hover:shadow-xl">
                    <div class="aspect-[3/4] w-full">
                        <img src="{{ url('/assets/img/yeat.webp') }}" alt="Billie Eilish"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                    </div>

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3
                            class="text-xl font-bold text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            Yeat</h3>
                        <p
                            class="text-red-500 font-medium translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                            Rage/Trap</p>
                        <p
                            class="text-gray-300 text-sm mt-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150">
                            Grammy-winning artist known for her haunting vocals and unique production.</p>
                    </div>
                </div>

                <!-- Artist 3 -->
                <div
                    class="group relative overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
                    <div class="aspect-[3/4] w-full">
                        <img src="{{ url('/assets/img/destroy.jpg') }}" alt="The Weeknd"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                    </div>

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3
                            class="text-xl font-bold text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            The Weeknd</h3>
                        <p
                            class="text-red-500 font-medium translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                            R&B/Pop</p>
                        <p
                            class="text-gray-300 text-sm mt-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150">
                            Innovative artist blending R&B, pop and electronic music with dark themes.</p>
                    </div>
                </div>

                <!-- Artist 4 -->
                <div
                    class="group relative overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
                    <div class="aspect-[3/4] w-full">
                        <img src="{{ url('/assets/img/underground.jpg') }}" alt="Doja Cat"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                    </div>

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                        <h3
                            class="text-xl font-bold text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            Nettspend</h3>
                        <p
                            class="text-red-500 font-medium translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                            Underground/R&B</p>
                        <p
                            class="text-gray-300 text-sm mt-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150">
                            Versatile artist known for catchy hooks and genre-bending music.</p>
                    </div>
                </div>

            </div>
        </div>




    </section>












@endsection
@extends('layouts.app')
@section('title', 'Artist Profile')
@section('content')





    <div class="bg-black text-white p-12">
        <!-- Album Header -->
        <div class="flex gap-4 mb-6">
            <div class="w-44 flex-shrink-0">
                <img src="{{ asset('assets/img/2093.jpg') }}" alt="2093 Album Cover" class="w-full h-full object-cover">
            </div>
            <div>
                <div class="flex items-center gap-2 text-gray-400 text-sm mb-1">
                    <i class="fas fa-user-circle"></i>
                    <span>Yeat</span>
                </div>
                <h1 class="text-2xl font-bold mb-1">2093</h1>
                <div class="text-red-500 text-sm mb-2">ALBUM</div>
                <p class="text-gray-300 text-sm">
                    traded his earlier baby cadences for a more aggressive, hard-hitting vocal performance. Harris describes
                    Carti's approach as one that continues with his "signature unearthly sound" while opting out of
                </p>
            </div>
        </div>

        <!-- Tracklist -->
        <div class="border border-red-600 rounded-lg overflow-hidden mb-8">
            <div class="divide-y divide-gray-800">
                <!-- Track 1 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Psycho CEO</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 2 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Power Trip</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 3 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Breathe</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 4 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Morë</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 5 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Bought The Earth</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 6 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Nothing Changë</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 7 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">U Should Know</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 8 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Lyfestylë (featuring Lil Wayne)</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 9 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">ILUV</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 10 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">As We Speak (featuring Drake)</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 11 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Tell Me</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>

                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Shade</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Keep Pushin’</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Riot & Set It Off</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Team ceo</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">2093</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Stand on it (with future)</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">familia</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Mr.Inbetweenit</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Psychocaine</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">Run they Mouth</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">If we beign real</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
                <!-- Track 12 -->
                <div class="flex items-center p-3 hover:bg-gray-900">
                    <div class="w-10 h-10 mr-3">
                        <img src="{{ asset('assets/img/2093.jpg') }}" alt="Track thumbnail"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="font-medium">1093</p>
                        <p class="text-xs text-gray-400">Yeat</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-400">10000</span>
                        <span class="text-xs text-gray-400">3:24</span>
                        <button class="text-gray-400 hover:text-white">
                            <i class="far fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mb-20">
            <h2 class="text-xl font-bold mb-4">Comments</h2>

            <!-- Comment 1 -->
            <div class="border border-red-900 rounded-lg p-4 mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="font-bold">Houssam Bensaltana</span>
                </div>
                <input type="text" placeholder="Share your thoughts..."
                    class="text-sm text-gray-300 mb-3 p-2 w-full bg-transparent border-b border-gray-500 focus:outline-none focus:border-red-600" />
                <div class="flex justify-end">
                    <button class="bg-red-600 text-white px-4 py-1 rounded text-sm">Submit</button>
                </div>
            </div>


            <!-- Comment 2 -->
            <div class="border border-gray-800 rounded-lg p-4 mb-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded-full bg-gray-700 flex items-center justify-center text-xs">S</div>
                    <span class="font-bold">Lebron james</span>
                </div>
                <p class="text-sm text-gray-300">
                    I love this album! It's on repeat every day. The beats are incredible, and the lyrics really resonate
                    with me. Each track has its own unique vibe, and I can't get enough of it. This album is definitely one
                    of the best releases this year. Highly recommended to anyone who appreciates good music!
                </p>
            </div>

            <!-- Comment 3 -->
            <div class="border border-gray-800 rounded-lg p-4">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded-full bg-red-700 flex items-center justify-center text-xs">N</div>
                    <span class="font-bold">Niz</span>
                </div>
                <p class="text-sm text-gray-300">
                    This album is fire! Yeat really outdid himself with this one. The production is top-notch and the lyrics
                    are on point. Every track brings something new to the table. Can't stop listening to it!
                </p>
            </div>
        </div>


    </div>

 





@endsection
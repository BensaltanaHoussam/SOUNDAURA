@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="py-12 px-4 md:px-8 h-screen bg-black">
        <div class="mx-auto px-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    My playlists
                    <span class="ml-2 text-sm text-red-600">{{ $playlists->count() }}</span>
                </h2>

                <!-- Create Playlist Button -->
                <button onclick="openModal()"
                    class="bg-black border text-white px-4 py-2 rounded-md hover:bg-red-500 transition-colors">
                    Create Playlist +
                </button>
            </div>

            <!-- Create Playlist Modal -->
            <div id="createPlaylistModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 transition-all duration-300">
                <div
                    class="bg-black border  p-8 rounded-lg w-full max-w-md transform transition-all duration-300 scale-75 opacity-0">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-white">Create New Playlist</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('listner.playlists.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Cover Image</label>
                                <input type="file"  name="cover_image" accept="image/*" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0 file:text-sm file:font-semibold
                                    file:bg-red-600 file:text-white hover:file:bg-red-700">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Title</label>
                                <input type="text" placeholder="write a title" name="title" required
                                    class="w-full bg-black border border-gray-700 rounded-md p-2 text-white">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-white mb-2">Description</label>
                                <textarea placeholder="write a description" name="description" rows="3"
                                    class="w-full bg-black border border-gray-700 rounded-md p-2 text-white"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-black border transition-colors">
                                Create Playlist
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Playlists Grid -->
            <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($playlists as $playlist)
                    <div class="group">
                        <div class="relative overflow-hidden mb-3 bg-gray-900 border border-gray-800">
                            <img src="{{ $playlist->cover_image ? asset('storage/' . $playlist->cover_image) : asset('assets/img/default-playlist.jpg') }}"
                                alt="{{ $playlist->title }}"
                                class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-300">
                        </div>
                        <div class="text-center">
                            <h3 class="text-white font-medium text-sm">{{ $playlist->title }}</h3>
                            <p class="text-gray-400 text-xs">{{ $playlist->tracks_count }} tracks</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function openModal() {
            const modal = document.getElementById('createPlaylistModal');
            const modalContent = modal.querySelector('.bg-black');

            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-75', 'opacity-0');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('createPlaylistModal');
            const modalContent = modal.querySelector('.bg-black');

            modalContent.classList.add('scale-75', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('createPlaylistModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
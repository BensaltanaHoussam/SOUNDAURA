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
                                <input type="file" name="cover_image" accept="image/*"
                                    class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4
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
                    <div class="bg-gray-300/20 p-4 rounded-lg text-white hover:bg-gray-800/40 transition relative group">
                        <!-- Playlist Link -->
                        <a href="{{ route('listner.playlists.show', $playlist) }}">
                            <img src="{{ $playlist->cover_image ? asset('storage/' . $playlist->cover_image) : asset('assets/img/default-playlist.jpg') }}"
                                alt="{{ $playlist->title }}" class="w-full aspect-square object-cover mb-3 rounded">
                            <h3 class="font-bold">{{ $playlist->title }}</h3>
                            <p class="text-sm text-gray-400">{{ $playlist->tracks_count }} tracks</p>
                        </a>

                        <!-- Three Dots Menu -->
                        <div x-data="{ open: false }" class="absolute top-2 right-2">
                            <button @click.stop="open = !open"
                                class="p-1.5 rounded-full bg-black hover:bg-black/70 opacity-0 group-hover:opacity-100 transition">
                                <i class="ri-more-2-fill text-white"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute top-0 mt-1  rounded-md shadow-lg bg-gray-900 ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1">
                                    <form action="{{ route('listner.playlists.destroy', $playlist) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this playlist?')"
                                        class="block w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full px-4 py-2 text-sm text-left text-red-500 hover:bg-gray-800 flex items-center gap-2">
                                            <i class="ri-delete-bin-line"></i>

                                        </button>
                                    </form>
                                    <!-- Edit Button -->
                                    <button
                                        onclick="openEditModal('{{ $playlist->id }}', '{{ $playlist->title }}', '{{ $playlist->description }}')"
                                        class="w-full px-4 py-2 text-sm text-left text-white hover:bg-gray-800 flex items-center gap-2">
                                        <i class="ri-edit-line"></i>
                                        <span>Edit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <!-- Edit Playlist Modal -->
        <div id="editPlaylistModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-black border p-8 rounded-lg w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Edit Playlist</h3>
                    <button onclick="closeEditModal()" class="text-gray-400 hover:text-white">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <form id="editPlaylistForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Cover Image</label>
                            <input type="file" name="cover_image" accept="image/*" class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0 file:text-sm file:font-semibold
                                file:bg-red-600 file:text-white hover:file:bg-red-700">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Title</label>
                            <input type="text" name="title" id="editTitle" required
                                class="w-full bg-black border border-gray-700 rounded-md p-2 text-white">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-white mb-2">Description</label>
                            <textarea name="description" id="editDescription" rows="3"
                                class="w-full bg-black border border-gray-700 rounded-md p-2 text-white"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-black border transition-colors">
                            Update Playlist
                        </button>
                    </div>
                </form>
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






        function openEditModal(playlistId, title, description) {
            const modal = document.getElementById('editPlaylistModal');
            const form = document.getElementById('editPlaylistForm');
            const titleInput = document.getElementById('editTitle');
            const descriptionInput = document.getElementById('editDescription');

            // Set form action
            form.action = `/listner/playlists/${playlistId}`;

            // Set form values
            titleInput.value = title;
            descriptionInput.value = description;

            // Show modal
            modal.classList.remove('hidden');
        }

        function closeEditModal() {
            const modal = document.getElementById('editPlaylistModal');
            modal.classList.add('hidden');
        }

        
        document.getElementById('editPlaylistModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>
@endsection
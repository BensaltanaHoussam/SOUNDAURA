<div x-data="{ showModal: false }" class="relative" @click.stop>
    <button @click="showModal = true" class="text-gray-400  hover:text-red-500 p-2 rounded-full hover:bg-gray-800">
        <i class="ri-add-circle-fill"></i>
    </button>

    <div x-show="showModal" 
         x-cloak
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-gray-900 p-6 rounded-lg max-w-md w-full" @click.away="showModal = false">
            <h3 class="text-xl font-bold text-white mb-4">Add to Playlist</h3>
            
            <div class="max-h-60 overflow-y-auto">
                @foreach($playlists as $playlist)
                    <form action="{{ route('listner.playlists.add-track', $playlist) }}" method="POST" class="mb-2">
                        @csrf
                        <input type="hidden" name="track_id" value="{{ $trackId }}">
                        <button type="submit" 
                            class="w-full text-left p-2 hover:bg-gray-800 text-white rounded flex items-center">
                            <img src="{{ $playlist->cover_image ? asset('storage/' . $playlist->cover_image) : asset('assets/img/default-playlist.jpg') }}" 
                                 class="w-10 h-10 object-cover rounded mr-3">
                            <span>{{ $playlist->title }}</span>
                        </button>
                    </form>
                @endforeach
            </div>

            <button @click="showModal = false" class="mt-4 text-gray-400 hover:text-white">
                Close
            </button>
        </div>
    </div>
</div>
@extends('layouts.dashboard')
@section('title', 'Home')
@section('content')




    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">My Music</h2>
            <button onclick="openModal()"
                class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
                Create
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6">
            <button class="bg-red-600 text-gray-200 px-6 py-2 rounded-full">Drafts</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Distributed</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Deleted</button>
        </div>

        <!-- Search Bar -->
        <div class="relative mb-6">
            <i class="fas fa-search absolute left-3 top-3 text-slate-500"></i>
            <input type="text" placeholder="Search title, artist"
                class="w-full bg-black border border-slate-700 rounded-md py-2 pl-10 pr-4 focus:outline-none focus:ring-1 focus:ring-slate-600">
        </div>

        <!-- Layout Toggle -->
        <div class="flex justify-between items-center mb-4">
            <div></div>
            <div class="flex items-center gap-2 text-slate-400">
                <span>Layout</span>
                <button class="p-1 hover:bg-slate-700 rounded">
                    <i class="fas fa-table-cells"></i>
                </button>
                <button class="p-1 hover:bg-slate-700 rounded">
                    <i class="fas fa-grip"></i>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-slate-400 border-b border-slate-800">
                        <th class="pb-3 pl-2">TITLE</th>
                        <th class="pb-3">Features</th>
                        <th class="pb-3">TYPE</th>
                        <th class="pb-3">RELEASE DATE</th>
                        <th class="pb-3">LIKES</th>
                        <th class="pb-3">STATUS</th>
                        <th class="pb-3">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-800 hover:bg-slate-800">
                        <td class="py-4 pl-2">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-triangle-exclamation text-orange-500"></i>
                                <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                    <img src="{{asset('assets/img/up2me.jpg')}}" alt="Album Cover"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div>Lying 4 Fun</div>
                                    <div class="text-slate-400 text-sm">Yeat</div>
                                </div>
                            </div>
                        </td>
                        <td>PaRaKa</td>
                        <td>Single</td>
                        <td>2025-03-18</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <button class="text-orange-500 hover:text-orange-400">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>
                                <span class="text-slate-400">12</span>
                            </div>
                        </td>
                        <td>
                            <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Accepted</span>
                        </td>
                        <td class=" pr-4">
                            <div class="flex justify-end gap-4">
                                <!-- Edit Button -->
                                <button class="text-slate-400 hover:text-white">
                                    <i class="ri-edit-box-fill"></i>
                                </button>

                                <!-- Delete Button -->
                                <button class="text-red-500 hover:text-red-400">
                                    <i class="ri-delete-bin-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>




        <!-- Pagination -->
        <div class="flex justify-center mt-6">
            <div class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-700">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="createSongModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-black border p-8 rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold">Add New Song</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{route('artist.tracks.store')}}" method="POST" enctype="multipart/form-data"
                class="space-y-6 w-[600px]">
                @csrf

          

                <div class="flex md:flex-row gap-6">

                    <div class=" space-y-4 w-full">
                        <!-- Song title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Song Name</label>
                            <input type="text" name="title" required
                                class="w-full bg-black border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-red-500">
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                            <textarea name="description" rows="3"
                                class="w-full bg-black border border-gray-700 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-red-500"></textarea>
                        </div>

                        <!-- Features -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Features</label>
                            <input type="text" name="features"
                                class="w-full bg-black border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-red-500">
                        </div>
                        <!-- genre Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Category</label>
                            <select name="category_id" required
                                class="w-full bg-black border border-slate-700 rounded-md py-2 px-3 focus:outline-none focus:ring-1 focus:ring-slate-600">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="space-y-4 w-full">
                        <!-- Cover Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Cover Image</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="w-full flex flex-col items-center px-4 py-6 bg-black text-gray-400 rounded-lg tracking-wide border border-gray-700 cursor-pointer hover:bg-gray-700">
                                    <div id="coverPreview" class="hidden w-24 h-24 mb-2">
                                        <img src="" alt="Cover Preview" class="w-full h-full object-cover rounded-lg">
                                    </div>
                                    <i id="coverIcon" class="fas fa-cloud-upload-alt text-xl"></i>
                                    <span id="coverText" class="mt-1 text-sm">Select cover image</span>
                                    <input type="file" name="cover_image" id="coverInput" class="hidden" accept="image/*"
                                        required onchange="previewCover(this)">
                                </label>
                            </div>
                        </div>

                        <!-- Audio Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Audio File</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="w-full flex flex-col items-center px-4 py-6 bg-black text-gray-400 rounded-lg tracking-wide border border-gray-700 cursor-pointer hover:bg-gray-700">
                                    <div id="audioPreview" class="hidden w-full mb-2">
                                        <audio controls class="w-full">
                                            <source src="" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                    <i id="audioIcon" class="fas fa-music text-xl"></i>
                                    <span id="audioText" class="mt-1 text-sm">Select audio file</span>
                                    <input type="file" name="audio_file" id="audioInput" class="hidden" accept="audio/*"
                                        required onchange="previewAudio(this)">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('createSongModal').classList.remove('hidden');
            document.getElementById('createSongModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('createSongModal').classList.remove('flex');
            document.getElementById('createSongModal').classList.add('hidden');
        }


        function previewCover(input) {
            const preview = document.getElementById('coverPreview');
            const icon = document.getElementById('coverIcon');
            const text = document.getElementById('coverText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.querySelector('img').src = e.target.result;
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                    text.textContent = input.files[0].name;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewAudio(input) {
            const preview = document.getElementById('audioPreview');
            const icon = document.getElementById('audioIcon');
            const text = document.getElementById('audioText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.querySelector('audio source').src = e.target.result;
                    preview.querySelector('audio').load();
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                    text.textContent = input.files[0].name;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>








@endsection
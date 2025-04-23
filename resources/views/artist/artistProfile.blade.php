@extends('layouts.dashboard')
@section('title', 'Edit Profile')
@section('content')

    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('artist.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold">Edit Profile</h2>
                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
                        Save Changes
                        <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>

            <!-- Profile Overview -->
            <div class="bg-black rounded-lg p-6 mb-6">
                <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                    <!-- Profile Picture Section -->
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 bg-slate-700 rounded-full overflow-hidden mb-4">
                            <img src="{{ auth()->user()->profilePicture ? asset('storage/' . auth()->user()->profilePicture) : asset('assets/img/profile.jpg') }}"
                                alt="Profile Picture" class="w-full h-full object-cover" id="profilePreview">
                        </div>
                        <label
                            class="bg-red-600 hover:bg-slate-600 text-white px-4 py-2 rounded-md text-sm cursor-pointer">
                            Change Photo
                            <input type="file" name="profilePicture" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                        </label>
                    </div>

                    <!-- Profile Details Section -->
                    <div class="flex-1">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block text-slate-400 text-sm mb-2" for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                    class="w-full bg-black border border-slate-700 rounded-md px-4 py-2 focus:outline-none focus:border-red-500">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 md:col-span-2">
                                <label class="block text-slate-400 text-sm mb-2" for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                    class="w-full bg-black border border-slate-700 rounded-md px-4 py-2 focus:outline-none focus:border-red-500">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4 md:col-span-2">
                                <label class="block text-slate-400 text-sm mb-2" for="bio">Bio</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="w-full bg-black border border-slate-700 rounded-md px-4 py-2 focus:outline-none focus:border-red-500">{{ auth()->user()->bio }}</textarea>
                                @error('bio')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const preview = document.getElementById('profilePreview');
                preview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    <div class="bg-black text-white p-12">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('listner.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-2">Profile Picture</label>
                    <img 
                        src="{{ auth()->user()->profilePicture 
                            ? asset('storage/' . auth()->user()->profilePicture) 
                            : asset('images/default-profile.png') }}" 
                        alt="Profile Picture"
                        class="w-32 h-32 rounded-full mb-4 object-cover bg-gray-700"
                    >
                    <input type="file" name="profilePicture" class="w-full text-sm text-gray-300" accept="image/*">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-md p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-md p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Bio</label>
                    <textarea name="bio" rows="4"
                        class="w-full bg-gray-900 border border-gray-700 rounded-md p-2">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                        Update Profile
                    </button>
                </div>
            </form>

         
        </div>
    </div>
@endsection
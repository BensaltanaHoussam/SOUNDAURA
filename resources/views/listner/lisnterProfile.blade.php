@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    <div class="bg-black text-white  h-screen p-12">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
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
                    <input type="text" name="name" value="{{ old('name', $user->name) }} " placeholder="Enter your name"
                        class="w-full bg-black border border-gray-700 rounded-md p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter your email"
                        class="w-full bg-black  border border-gray-700 rounded-md p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Bio</label>
                    <textarea name="bio" rows="4" placeholder="Tell us about yourself"
                        class="w-full bg-black  border border-gray-700 rounded-md p-2">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                        Update Profile
                    </button>
                </div>
            </form>

     
            <div class="mt-8 pt-8 border-t border-gray-700">
                <h2 class="text-xl font-bold mb-4 text-red-500">Delete account ?</h2>
                <form action="{{ route('listner.profile.delete') }}" method="POST" class="inline"
                    onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
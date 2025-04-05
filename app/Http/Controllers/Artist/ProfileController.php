<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('artist.artistProfile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:1000',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('profilePicture')) {
            $profilePicture = $request->file('profilePicture')->store('profiles', 'public');
            $user->profilePicture = $profilePicture;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->bio = $validated['bio'];
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}

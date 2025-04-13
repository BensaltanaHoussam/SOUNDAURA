<?php

namespace App\Http\Controllers\listner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class ListnerProfileController extends Controller
{
    public function edit()
    {
        return view('listner.lisnterProfile', [
            'user' => auth()->user()
        ]);
    }


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'bio' => 'nullable|string|max:1000',
            'profilePicture' => 'nullable|image|max:2048'
        ]);

        $user = auth()->user();

        if ($request->hasFile('profilePicture')) {
            if ($user->profilePicture) {
                Storage::delete($user->profilePicture);
            }
            $validated['profilePicture'] = $request->file('profilePicture')->store('profile-pictures', 'public');
        }

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully');
    }




}

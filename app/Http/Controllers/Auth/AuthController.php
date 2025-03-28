<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:artiste,listner'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'active'
        ]);

        auth()->login($user);

        return redirect()->route(
            match ($user->role) {
                'artiste' => 'songsDashboard',
                'listner' => 'index',
                'admin' => 'adminAnalytics',
            }
        )->with('success', 'Registration successful!');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route(
                auth()->user()->role === 'artiste' ? 'songsDashboard' :
                (auth()->user()->role === 'listner' ? 'playlists' :
                    (auth()->user()->role === 'admin' ? 'users' : 'home'))
            )->with('success', 'Welcome back!');
        }

        return back()
            ->withInput($request->except('password'))
            ->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    



}

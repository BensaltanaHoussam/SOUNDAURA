<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Public routes
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Artist routes with middleware
Route::middleware(['artist'])->prefix('artist')->group(function () {
    Route::get('/songs', function () {
        return view('artist.songsDashboard');
    })->name('songsDashboard');

    Route::get('/albums', function () {
        return view('artist.albumDashboard');
    })->name('albumDashboard');

    Route::get('/analytics', function () {
        return view('artist.analytics');
    })->name('analytics');

    Route::get('/reviews', function () {
        return view('artist.reviews');
    })->name('reviews');
});

// Admin routes with middleware
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/users', function () {
        return view('admin.releaseDashboard');
    })->name('users');

    Route::get('/analytics', function () {
        return view('admin.adminAnalytics');
    })->name('adminAnalytics');
});

// Listener routes (no middleware since it's default)
Route::prefix('listner')->group(function () {
    Route::get('/artist', function () {
        return view('listner.artistProfile');
    })->name('profile');

    Route::get('/album', function () {
        return view('listner.albumDetails');
    })->name('album');

    Route::get('/playlists', function () {
        return view('listner.playlists');
    })->name('playlists');
});
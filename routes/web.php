<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Artist\AlbumsController;
use App\Http\Controllers\artist\ProfileController;
use App\Http\Controllers\Artist\TracksController;
use App\Http\Controllers\listner\HomeController;
use App\Models\Album;
use App\Models\category;
use App\Models\Track;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Public routes


Route::get('/signup', function () {
    return view('auth.signup');
})->name('register');
Route::post('/signup', [AuthController::class, 'register'])->name('register.submit');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Artist routes with middleware
Route::middleware(['artist'])->prefix('artist')->group(function () {


    Route::get('/songs', function () {
        $categories = category::all();
        $tracks = Track::where('user_id', auth()->id())->latest()->get();
        return view('artist.songsDashboard', compact('categories', 'tracks'));
    })->name('songsDashboard');
    Route::post('/songs', [TracksController::class, 'store'])->name('artist.tracks.store');



    Route::get('/albums', function () {
        $categories = category::all();
        $albums = Album::with('tracks')->where('user_id', auth()->id())->latest()->get();
        return view('artist.albumDashboard', compact('categories', 'albums'));
    })->name('albumDashboard');
    Route::post('/albums', [AlbumsController::class, 'store'])->name('artist.albums.store');




    Route::get('/analytics', function () {
        return view('artist.analytics');
    })->name('analytics');

    Route::get('/reviews', function () {
        return view('artist.reviews');
    })->name('reviews');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('artist.profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('artist.profile.update');


});

// Admin routes with middleware
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/users', function () {
        return view('admin.releaseDashboard');
    })->name('users');

    Route::get('/analytics', function () {
        return view('admin.adminAnalytics');
    })->name('adminAnalytics');

    Route::get('/categories', function () {
        return view('admin.categories');
    })->name('categories');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::middleware(['auth', 'listner'])->prefix('listner')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

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
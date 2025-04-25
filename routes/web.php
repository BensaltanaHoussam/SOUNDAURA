<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Artist\AlbumsController;
use App\Http\Controllers\artist\ProfileController;
use App\Http\Controllers\Artist\TracksController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Listner\CommentController;
use App\Http\Controllers\listner\FavoriteController;
use App\Http\Controllers\listner\FollowController;
use App\Http\Controllers\listner\HomeController;
use App\Http\Controllers\listner\ListnerProfileController;
use App\Http\Controllers\Listner\PlaylistController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\visitor\VisitorController;
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

Route::get('/', [VisitorController::class, 'index'])->name('index');


Route::get('/search', [SearchController::class, 'search'])->name('listner.search');

Route::post('/tracks/{track}/like', [LikeController::class, 'toggleLike'])->name('tracks.like');


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

    Route::get('/artist/{user}', [HomeController::class, 'showArtistProfile'])->name('listner.artist.profile');
    Route::get('/album/{album}', [HomeController::class, 'showAlbumDetails'])->name('listner.album.details');

    Route::get('/playlists', [PlaylistController::class, 'index'])->name('listner.playlists');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('listner.playlists.store');
    Route::post('/playlists/{playlist}/tracks', [PlaylistController::class, 'addTrack'])->name('listner.playlists.add-track');
    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('listner.playlists.show');
    Route::delete('/playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('listner.playlists.destroy');
    Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('listner.playlists.update');




    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


    Route::get('/profile', [ListnerProfileController::class, 'edit'])->name('listner.profile.edit');
    Route::put('/profile', [ListnerProfileController::class, 'update'])->name('listner.profile.update');
    Route::delete('/profile', [ListnerProfileController::class, 'destroy'])->name('listner.profile.delete');



    Route::post('/favorites', [FavoriteController::class, 'toggleFavorite'])->name('listner.favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('listner.favorites');




    Route::post('/follow/{artist}', [FollowController::class, 'toggleFollow'])->name('follow.toggle');
    Route::get('/artist/{artist}/followers', [FollowController::class, 'followers'])->name('artist.followers');
    Route::get('/artist/{artist}/following', [FollowController::class, 'following'])->name('artist.following');

    Route::get('/songs', [HomeController::class, 'allSongs'])->name('listner.all-songs');
    Route::get('/filter-tracks', [HomeController::class, 'filterTracks'])->name('tracks.filter');










});
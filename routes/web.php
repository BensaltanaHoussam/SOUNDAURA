<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/signup', function () {
    return view('auth.signup');
});

Route::get('/login', function () {
    return view(view: 'auth.login');
});




Route::get('/listner/artist', function () {
    return view(view: 'listner.artistProfile');
})->name('profile');

Route::get('/listner/album', function () {
    return view(view: 'listner.albumDetails');
})->name('album');

Route::get('/listner/playlists', function () {
    return view(view: 'listner.playlists');
})->name('playlists');





Route::get('/admin/users', function () {
    return view(view: 'admin.releaseDashboard');
})->name('users');

Route::get('/admin/analytics', function () {
    return view(view: 'admin.adminAnalytics');
})->name('adminAnalytics');




Route::get('/artist/songs', function () {
    return view(view: 'artist.songsDashboard');
})->name(name: 'songsDashboard');


Route::get('/artist/albums', function () {
    return view(view: 'artist.albumDashboard');
})->name(name: 'albumDashboard');


Route::get('/artist/analytics', function () {
    return view(view: 'artist.analytics');
})->name(name: 'analytics');


Route::get('/artist/reviews', function () {
    return view(view: 'artist.reviews');
})->name(name: 'reviews');


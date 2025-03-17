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


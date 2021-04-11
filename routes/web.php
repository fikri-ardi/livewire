<?php

use Illuminate\Support\Facades\Route;

Route::view('/test', 'test');

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Livewire\Home::class);
    Route::get('/profile', \App\Http\Livewire\Profile::class);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', \App\Http\Livewire\Auth\Register::class)->name('register');
    Route::get('/login', \App\Http\Livewire\Auth\Login::class)->name('login');
});
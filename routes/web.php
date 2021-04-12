<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Livewire\Home::class)->name('home');
    Route::get('/users', \App\Http\Livewire\User::class)->name('users');
    Route::get('/wallets', \App\Http\Livewire\Wallet::class)->name('wallets');
    Route::get('/stats', \App\Http\Livewire\Stat::class)->name('stats');
    Route::get('/activities', \App\Http\Livewire\Activity::class)->name('activities');
    Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', \App\Http\Livewire\Auth\Register::class)->name('register');
    Route::get('/login', \App\Http\Livewire\Auth\Login::class)->name('login');
});

Route::get('/download', \App\Http\Livewire\Download::class);
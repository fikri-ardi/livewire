<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Livewire\Home::class)->name('home');
    Route::get('/users', \App\Http\Livewire\Users::class)->name('users');
    Route::get('/attendances', \App\Http\Livewire\Attendances::class)->name('attendances');
    Route::get('/lessons', \App\Http\Livewire\Lessons::class)->name('lessons');
    Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', \App\Http\Livewire\Auth\Register::class)->name('register');
    Route::get('/login', \App\Http\Livewire\Auth\Login::class)->name('login');
});

Route::get('/download', \App\Http\Livewire\Download::class);
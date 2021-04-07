<?php

use Illuminate\Support\Facades\Route;

Route::view('/test', 'test');

Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Http\Livewire\Home::class);
});

Route::get('/register', \App\Http\Livewire\Auth\Register::class);
Route::get('/login', \App\Http\Livewire\Auth\Login::class)->name('login')->middleware('guest');
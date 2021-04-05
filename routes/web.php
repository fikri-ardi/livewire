<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/register', \App\Http\Livewire\Auth\Register::class);
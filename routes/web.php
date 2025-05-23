<?php

use App\Livewire\Login;
use App\Livewire\Welcome;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', Welcome::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);
Route::get('/logout', [UserController::class, 'logout']);

<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\TicTacToe;

Route::get('/', Home::class)->name('home');
Route::get('/game/{code}', TicTacToe::class)->name('game');

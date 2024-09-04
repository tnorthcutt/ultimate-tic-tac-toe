<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TicTacToe;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/game/{code?}', TicTacToe::class)->name('game');

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Home extends Component
{
    public function createGame()
    {
        $gameCode = Str::random(6);
        return redirect()->route('game', ['code' => $gameCode]);
    }

    public function render()
    {
        return view('livewire.home')
            ->layout('components.layouts.app');
    }

    public string $joinCode = '';

    public function joinGame()
    {
        $this->validate([
            'joinCode' => 'required|size:6'
        ]);

        return redirect()->route('game', ['code' => $this->joinCode]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UltimateBoard extends Component
{
    public array $board;
    public string $currentPlayer;
    public ?int $nextBoard;

    public function handleMove(int $boardIndex, int $squareIndex)
    {
        $this->emitUp('move', $boardIndex, $squareIndex);
    }

    public function render()
    {
        return view('livewire.ultimate-board');
    }
}

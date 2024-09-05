<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Board extends Component
{
    public array $squares;
    public int $boardIndex;
    public bool $disabled = false;

    public function handleSquareClick(int $squareIndex)
    {
        if ($this->disabled || $this->squares[$squareIndex] !== null) {
            return;
        }

        $this->emitUp('move', $this->boardIndex, $squareIndex);
    }

    public function render()
    {
        return view('livewire.board');
    }
}

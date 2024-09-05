<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Game extends Component
{
    public array $ultimateBoard;
    public string $currentPlayer = 'X';
    public ?int $nextBoard = null;

    public function mount()
    {
        $this->ultimateBoard = array_fill(0, 9, array_fill(0, 9, null));
    }

    public function handleMove(int $boardIndex, int $squareIndex)
    {
        if ($this->nextBoard !== null && $this->nextBoard !== $boardIndex && !$this->isWon($this->ultimateBoard[$this->nextBoard])) {
            return; // Invalid move
        }

        $this->ultimateBoard[$boardIndex][$squareIndex] = $this->currentPlayer;
        $this->currentPlayer = $this->currentPlayer === 'X' ? 'O' : 'X';
        $this->nextBoard = $this->isWon($this->ultimateBoard[$squareIndex]) ? null : $squareIndex;
    }

    private function isWon(array $board): ?string
    {
        // Implement win checking logic for a single board
        // ...
    }

    private function getUltimateWinner(): ?string
    {
        // Implement win checking logic for the ultimate board
        // ...
    }

    public function render()
    {
        return view('livewire.game');
    }
}

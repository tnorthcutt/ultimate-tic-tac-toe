<?php

namespace App\Livewire;

use Livewire\Component;

class TicTacToe extends Component
{
    public array $ultimateBoard;
    public string $currentPlayer = 'X';
    public ?int $nextBoard = null;
    public string $gameCode;

    public function mount($code)
    {
        $this->gameCode = $code;
        $this->ultimateBoard = array_fill(0, 9, array_fill(0, 9, null));
    }

    public function makeMove($boardIndex, $position)
    {
        if ($this->nextBoard !== null && $this->nextBoard !== $boardIndex && !$this->isWon($this->ultimateBoard[$this->nextBoard])) {
            return; // Invalid move
        }

        if ($this->ultimateBoard[$boardIndex][$position] === null) {
            $this->ultimateBoard[$boardIndex][$position] = $this->currentPlayer;
            $this->currentPlayer = $this->currentPlayer === 'X' ? 'O' : 'X';
            $this->nextBoard = $this->isWon($this->ultimateBoard[$position]) ? null : $position;
        }
    }

    public function isWon($board)
    {
        $lines = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],
            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],
            [0, 4, 8],
            [2, 4, 6],
        ];

        foreach ($lines as $line) {
            [$a, $b, $c] = $line;
            if ($board[$a] && $board[$a] === $board[$b] && $board[$a] === $board[$c]) {
                return $board[$a];
            }
        }

        return null;
    }

    private function getUltimateWinner()
    {
        $ultimateState = array_map([$this, 'isWon'], $this->ultimateBoard);
        return $this->isWon($ultimateState);
    }

    public function render()
    {
        return view('livewire.tic-tac-toe', [
            'ultimateWinner' => $this->getUltimateWinner(),
        ])->layout('components.layouts.app');
    }
}

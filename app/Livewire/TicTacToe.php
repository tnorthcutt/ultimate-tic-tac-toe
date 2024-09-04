<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TicTacToe extends Component
{
    public $game;
    public $board;
    public $currentPlayer;
    public $winner;
    public $playerSymbol;

    public function mount($code = null)
    {
        if ($code) {
            $this->game = Game::where('code', $code)->firstOrFail();
            $this->playerSymbol = $this->determinePlayerSymbol();
        } else {
            $this->game = Game::create([
                'code' => $this->generateUniqueCode(),
                'board' => array_fill(0, 9, null),
                'current_player' => 'X',
                'player_x' => session()->getId(),  // Store the session ID for player X
            ]);
            $this->playerSymbol = 'X';

            return Redirect::to(route('game', ['code' => $this->game->code]));
        }

        $this->board = $this->game->board ?? array_fill(0, 9, null);
        $this->currentPlayer = $this->game->current_player;
        $this->winner = $this->game->winner;
    }

    private function determinePlayerSymbol()
    {
        if ($this->game->player_x === session()->getId()) {
            return 'X';
        }

        if ($this->game->player_o === session()->getId()) {
            return 'O';
        }

        if ($this->game->player_o === null) {
            $this->game->player_o = session()->getId();
            $this->game->save();
            return 'O';
        }

        // If both players are already assigned, this is a spectator
        return null;
    }

    public function makeMove($index)
    {
        if ($this->winner || $this->board[$index] || $this->currentPlayer !== $this->playerSymbol) {
            return;
        }

        $this->board[$index] = $this->currentPlayer;
        $this->game->board = $this->board;
        $this->game->current_player = $this->currentPlayer === 'X' ? 'O' : 'X';
        $this->game->save();

        $this->currentPlayer = $this->game->current_player;

        $this->checkWinner();
    }

    public function checkWinner()
    {
        $winningCombinations = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
            [0, 4, 8], [2, 4, 6] // Diagonals
        ];

        foreach ($winningCombinations as $combination) {
            if ($this->board[$combination[0]] &&
                $this->board[$combination[0]] === $this->board[$combination[1]] &&
                $this->board[$combination[0]] === $this->board[$combination[2]]) {
                $this->winner = $this->board[$combination[0]];
                $this->game->winner = $this->winner;
                $this->game->save();
                return;
            }
        }

        if (!in_array(null, $this->board)) {
            $this->winner = 'Draw';
            $this->game->winner = $this->winner;
            $this->game->save();
        }
    }

    private function generateUniqueCode()
    {
        $code = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        while (Game::where('code', $code)->exists()) {
            $code = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        }
        return $code;
    }

    public function pollGameState()
    {
        $updatedGame = Game::find($this->game->id);
        $this->board = $updatedGame->board;
        $this->currentPlayer = $updatedGame->current_player;
        $this->winner = $updatedGame->winner;
    }

    public function render()
    {
        return view('livewire.tic-tac-toe', [
            'board' => $this->board,
            'currentPlayer' => $this->currentPlayer,
            'winner' => $this->winner,
            'playerSymbol' => $this->playerSymbol,
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    protected $polling = 3000; // Add this line for Livewire 2 polling (3 seconds)
}

<div class="container mx-auto mt-10 text-center">
    <h1 class="mb-4 text-4xl font-bold">Ultimate Tic-Tac-Toe</h1>

    @if($ultimateWinner)
        <h2 class="mb-4 text-3xl font-bold">{{ $ultimateWinner }} wins the game!</h2>
    @else
        <h2 class="mb-2 text-2xl">Current player: {{ $currentPlayer }}</h2>
        <h3 class="mb-4 text-xl">Next board: {{ $nextBoard !== null ? $nextBoard + 1 : 'Any' }}</h3>
    @endif

    <div class="grid grid-cols-3 gap-4 mx-auto max-w-3xl ultimate-board">
        @foreach($ultimateBoard as $boardIndex => $board)
            <div class="board relative grid grid-cols-3 gap-1 p-2 {{ $nextBoard === $boardIndex || $nextBoard === null ? 'bg-green-200' : 'bg-gray-200' }}">
                @foreach($board as $position => $value)
                    <button
                        wire:click="makeMove({{ $boardIndex }}, {{ $position }})"
                        {{ $ultimateWinner || ($nextBoard !== null && $nextBoard !== $boardIndex) || $value ? 'disabled' : '' }}
                        class="square w-full h-12 text-2xl font-bold bg-white border border-gray-300 hover:bg-gray-100 {{ $value ? ($value === 'X' ? 'text-blue-500' : 'text-red-500') : '' }}"
                    >
                        {{ $value }}
                    </button>
                @endforeach
                @if($boardWinner = $this->isWon($board))
                    <div class="flex absolute inset-0 justify-center items-center text-4xl font-bold text-white bg-black bg-opacity-50">
                        {{ $boardWinner }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

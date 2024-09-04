<div wire:poll="pollGameState" class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Tic-Tac-Toe</h1>

            @if($game->code)
                <p class="text-center text-gray-600 mb-4">Game Code: <span class="font-semibold">{{ $game->code }}</span></p>
            @endif

            @if($playerSymbol)
                <p class="text-center text-gray-600 mb-4">You are playing as: <span class="font-semibold text-blue-600">{{ $playerSymbol }}</span></p>
            @else
                <p class="text-center text-gray-600 mb-4">You are spectating</p>
            @endif

            <div class="grid grid-cols-3 gap-4 mb-8">
                @foreach($board as $index => $cell)
                    <button
                        wire:click="makeMove({{ $index }})"
                        {{ $cell || $winner || !$playerSymbol || $currentPlayer !== $playerSymbol ? 'disabled' : '' }}
                        class="w-20 h-20 text-4xl font-bold bg-gray-200 rounded-lg focus:outline-none hover:bg-gray-300 transition duration-150 ease-in-out {{ $cell ? ($cell === 'X' ? 'text-blue-600' : 'text-red-600') : '' }}"
                    >
                        {{ $cell }}
                    </button>
                @endforeach
            </div>

            @if($winner)
                <p class="text-center text-2xl font-semibold {{ $winner === 'Draw' ? 'text-yellow-600' : ($winner === 'X' ? 'text-blue-600' : 'text-red-600') }}">
                    {{ $winner === 'Draw' ? "It's a draw!" : "Winner: $winner" }}
                </p>
            @else
                <p class="text-center text-xl text-gray-700">
                    Current Player: <span class="font-semibold {{ $currentPlayer === 'X' ? 'text-blue-600' : 'text-red-600' }}">{{ $currentPlayer }}</span>
                </p>
            @endif
        </div>
    </div>
</div>

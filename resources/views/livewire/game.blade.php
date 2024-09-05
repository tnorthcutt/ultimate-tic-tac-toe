<div class="game">
    <livewire:ultimate-board
        :board="$ultimateBoard"
        :current-player="$currentPlayer"
        :next-board="$nextBoard"
    />
    <div class="game-info">
        <div>Next player: {{ $currentPlayer }}</div>
        <div>Next board: {{ $nextBoard !== null ? $nextBoard + 1 : 'Any' }}</div>
    </div>
</div>

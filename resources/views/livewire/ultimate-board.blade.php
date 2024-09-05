<div class="ultimate-board">
    @foreach ($board as $boardIndex => $smallBoard)
        <div class="small-board {{ $nextBoard === $boardIndex || $nextBoard === null ? 'active' : '' }}">
            <livewire:board
                :squares="$smallBoard"
                :board-index="$boardIndex"
                :disabled="$nextBoard !== null && $nextBoard !== $boardIndex"
                :key="$boardIndex"
            />
        </div>
    @endforeach
</div>

<div class="board">
    @foreach (array_chunk($squares, 3) as $row)
        <div class="board-row">
            @foreach ($row as $index => $square)
                <button
                    class="square"
                    wire:click="handleSquareClick({{ $index }})"
                    {{ $disabled || $square !== null ? 'disabled' : '' }}
                >
                    {{ $square }}
                </button>
            @endforeach
        </div>
    @endforeach
</div>

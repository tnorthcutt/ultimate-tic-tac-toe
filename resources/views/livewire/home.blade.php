<div class="container mx-auto mt-10 text-center">
    <h1 class="text-4xl font-bold mb-8">Ultimate Tic-Tac-Toe</h1>
    <button
        wire:click="createGame"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4"
    >
        Create New Game
    </button>

    <div class="mt-8">
        <input
            type="text"
            wire:model="joinCode"
            placeholder="Enter game code"
            class="border rounded py-2 px-4"
        >
        <button
            wire:click="joinGame"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2"
        >
            Join Game
        </button>
    </div>
</div>

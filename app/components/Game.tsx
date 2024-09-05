import React, { useState } from "react";
import UltimateBoard from "./UltimateBoard";

type Player = "X" | "O" | null;
type BoardState = Player[];
type UltimateBoardState = BoardState[];

const Game: React.FC = () => {
    const [ultimateBoard, setUltimateBoard] = useState<UltimateBoardState>(
        Array(9).fill(Array(9).fill(null))
    );
    const [currentPlayer, setCurrentPlayer] = useState<Player>("X");
    const [nextBoard, setNextBoard] = useState<number | null>(null);

    const handleMove = (boardIndex: number, squareIndex: number) => {
        if (
            nextBoard !== null &&
            nextBoard !== boardIndex &&
            !isWon(ultimateBoard[nextBoard])
        ) {
            return; // Invalid move
        }

        const newUltimateBoard = ultimateBoard.map((board, index) =>
            index === boardIndex
                ? board.map((square, idx) =>
                      idx === squareIndex ? currentPlayer : square
                  )
                : board
        );

        setUltimateBoard(newUltimateBoard);
        setCurrentPlayer(currentPlayer === "X" ? "O" : "X");
        setNextBoard(isWon(newUltimateBoard[squareIndex]) ? null : squareIndex);
    };

    const isWon = (board: BoardState): Player | null => {
        // Implement win checking logic for a single board
        // ...
    };

    const getUltimateWinner = (): Player | null => {
        // Implement win checking logic for the ultimate board
        // ...
    };

    return (
        <div className="game">
            <UltimateBoard
                board={ultimateBoard}
                onMove={handleMove}
                currentPlayer={currentPlayer}
                nextBoard={nextBoard}
            />
            <div className="game-info">
                <div>{`Next player: ${currentPlayer}`}</div>
                <div>{`Next board: ${
                    nextBoard !== null ? nextBoard + 1 : "Any"
                }`}</div>
            </div>
        </div>
    );
};

export default Game;

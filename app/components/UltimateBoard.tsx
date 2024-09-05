import React from "react";
import Board from "./Board";

type Player = "X" | "O" | null;
type BoardState = Player[];
type UltimateBoardState = BoardState[];

interface UltimateBoardProps {
    board: UltimateBoardState;
    onMove: (boardIndex: number, squareIndex: number) => void;
    currentPlayer: Player;
    nextBoard: number | null;
}

const UltimateBoard: React.FC<UltimateBoardProps> = ({
    board,
    onMove,
    currentPlayer,
    nextBoard,
}) => {
    return (
        <div className="ultimate-board">
            {board.map((smallBoard, boardIndex) => (
                <div
                    key={boardIndex}
                    className={`small-board ${
                        nextBoard === boardIndex || nextBoard === null
                            ? "active"
                            : ""
                    }`}
                >
                    <Board
                        squares={smallBoard}
                        onClick={(squareIndex) =>
                            onMove(boardIndex, squareIndex)
                        }
                        disabled={
                            nextBoard !== null && nextBoard !== boardIndex
                        }
                    />
                </div>
            ))}
        </div>
    );
};

export default UltimateBoard;

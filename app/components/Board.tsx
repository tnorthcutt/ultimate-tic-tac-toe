import React from "react";
import Square from "./Square";

type Player = "X" | "O" | null;

interface BoardProps {
    squares: Player[];
    onClick: (i: number) => void;
    disabled?: boolean;
}

const Board: React.FC<BoardProps> = ({
    squares,
    onClick,
    disabled = false,
}) => {
    const renderSquare = (i: number) => {
        return (
            <Square
                value={squares[i]}
                onClick={() => onClick(i)}
                disabled={disabled || squares[i] !== null}
            />
        );
    };

    return (
        <div className="board">
            <div className="board-row">
                {renderSquare(0)}
                {renderSquare(1)}
                {renderSquare(2)}
            </div>
            <div className="board-row">
                {renderSquare(3)}
                {renderSquare(4)}
                {renderSquare(5)}
            </div>
            <div className="board-row">
                {renderSquare(6)}
                {renderSquare(7)}
                {renderSquare(8)}
            </div>
        </div>
    );
};

export default Board;

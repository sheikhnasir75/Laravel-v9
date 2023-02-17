<?php

namespace App;

class TicTacToe
{
    public $board;

    public function __construct()
    {
        $this->board = [
            [null, null, null],
            [null, null, null],
            [null, null, null],
        ];
    }

    public function mark($row, $col, $player)
    {
        if ($this->board[$row][$col] !== null) {
            throw new \Exception("This position has already been marked.");
        }

        $this->board[$row][$col] = $player;
    }

    public function isGameOver()
    {
        return $this->checkRows() || $this->checkColumns() || $this->checkDiagonals();
    }

    private function checkRows()
    {
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[$i][0] !== null && $this->board[$i][0] === $this->board[$i][1] && $this->board[$i][1] === $this->board[$i][2]) {
                return true;
            }
        }

        return false;
    }

    private function checkColumns()
    {
        for ($i = 0; $i < 3; $i++) {
            if ($this->board[0][$i] !== null && $this->board[0][$i] === $this->board[1][$i] && $this->board[1][$i] === $this->board[2][$i]) {
                return true;
            }
        }

        return false;
    }

    private function checkDiagonals()
    {
        if ($this->board[0][0] !== null && $this->board[0][0] === $this->board[1][1] && $this->board[1][1] === $this->board[2][2]) {
            return true;
        }

        if ($this->board[0][2] !== null && $this->board[0][2] === $this->board[1][1] && $this->board[1][1] === $this->board[2][0]) {
            return true;
        }

        return false;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicTacToe;

class TicTacToeController extends Controller
{
    public function index()
    {
        $game = new TicTacToe();

        return view('tic-tac-toe', ['game' => $game]);
    }

    public function mark(Request $request)
    {
        $row = $request->input('row');
        $col = $request->input('col');
        $player = $request->input('player');

        $game = new TicTacToe();
        $game->mark($row, $col, $player);

        return response()->json(['status' => 'success']);
    }
}

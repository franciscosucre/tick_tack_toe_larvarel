<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Controllers\Controller;

class GamesController extends Controller
{
    public function currentGame()
    {
        $game = Game::firstOrCreate(
            ['X_won' => false, 'O_won' => false, 'tie' => false]
        );
        $game = Game::find($game->id);
        return view('game',['game' => $game]);
    }

    public function move($square){
        {
            $game = Game::firstOrCreate(
                ['X_won' => false, 'O_won' => false, 'tie' => false]
            );
            $turn = $game->turn;
            if (!$game->makeMove($square)){
                return redirect('/');
            };
        
            if ($game->isGameWon()){
                if ($turn === 'O'){
                    $game['O_won'] = true;
                } else {
                    $game['X_won'] = true;
                }
                $game->save();
                return redirect('/result/'.$game->id);
            }
        
            if ($game->isGameTied()){
                return redirect('/result/'.$game->id);
            }
        
            /* Pass the turn */
            $game->passTurn();
            return redirect('/');
        }
    }
    
    public function result($id){
        $game = Game::find($id);
        $line = $game->isGameWon();
        return view('result',['game' => $game, 'line'=> $line]);
    }
}
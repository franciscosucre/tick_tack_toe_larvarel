<?php
use App\Game;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $game = App\Game::firstOrCreate(
        ['X_won' => false, 'O_won' => false, 'tie' => false]
    );
    $game = App\Game::find($game->id);
    Log::info($game);
    return view('game',['game' => $game]);
});

Route::post('/{square}', function ($square) {
    $game = App\Game::firstOrCreate(
        ['X_won' => false, 'O_won' => false, 'tie' => false]
    );
    $turn = $game->turn;
    $game[$square];
    if ($game[$square]){
        return redirect('/');
    };
    $game[$square] = $turn;

    /* We obtain the values */
    $square_1 = $game->square_1;
    $square_2 = $game->square_2;
    $square_3 = $game->square_3;
    $square_4 = $game->square_4;
    $square_5 = $game->square_5;
    $square_6 = $game->square_6;
    $square_7 = $game->square_7;
    $square_8 = $game->square_8;
    $square_9 = $game->square_9;
    /* We verify if the player won */
    $v_line_1 = ($square_1 === $turn && $square_4 === $turn && $square_7 === $turn);
    $v_line_2 = ($square_2 === $turn && $square_5 === $turn && $square_8 === $turn);
    $v_line_3 = ($square_3 === $turn && $square_6 === $turn && $square_9 === $turn);
    $v_line = ($v_line_1 || $v_line_2 || $v_line_3);

    $h_line_1 = $square_1 === $turn && $square_2=== $turn && $square_3 === $turn;
    $h_line_2 = $square_4 === $turn && $square_5 === $turn && $square_6 === $turn;
    $h_line_3 = $square_7 === $turn && $square_8 === $turn && $square_9 === $turn;
    $h_line = ($h_line_1 || $h_line_2 || $h_line_3);

    $d_line_1 = $square_1 === $turn && $square_5 === $turn && $square_9 === $turn;
    $d_line_2 = $square_3 === $turn && $square_5 === $turn && $square_7 === $turn;
    $d_line = ($d_line_1 || $d_line_2);
    
    if ($v_line || $h_line || $d_line){
        if ($turn === 'O'){
            $game['O_won'] = true;
        } else {
            $game['X_won'] = true;
        }
        $game->save();
        return redirect('/result/'.$game->id);
    }

    if ($square_1 && $square_2 && $square_3 && $square_4 && $square_5 && $square_6 && $square_7 && $square_8 && $square_9 ){
        $game->tie = true;
        $game->save();
        return redirect('/result/'.$game->id);
    }

    /* Pass the turn */
    if ($turn === 'O'){
        $game->turn = 'X';
    } else {
        $game->turn = 'O';
    }
    $game->save();
    Log::info($game);
    return redirect('/');
});

Route::get('/result/{id}', function ($id) {
    $game = App\Game::find($id);
    Log::info('game'.$game);
    return view('result',['game' => $game]);
});
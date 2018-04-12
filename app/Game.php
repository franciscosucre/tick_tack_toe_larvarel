<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = array(
        'square_1', 
        'square_2', 
        'square_3',
        'square_4',
        'square_5',
        'square_6',
        'square_7',
        'square_8',
        'square_9',
        'turn',
        'X_won',
        'O_won'
    );

    public function makeMove($square){
        $turn = $this->turn;
        if ($this[$square]){
            return false;
        };
        $this[$square] = $turn;
        $this->save();
        return true;
    }

    public function passTurn(){
        if ($this->turn === 'O'){
            $this->turn = 'X';
        } else {
            $this->turn = 'O';
        }
        $this->save();
    }

    public function isGameTied()
    {
        /* We obtain the values */
        $square_1 = $this->square_1;
        $square_2 = $this->square_2;
        $square_3 = $this->square_3;
        $square_4 = $this->square_4;
        $square_5 = $this->square_5;
        $square_6 = $this->square_6;
        $square_7 = $this->square_7;
        $square_8 = $this->square_8;
        $square_9 = $this->square_9;

        if ($square_1 && $square_2 && $square_3 && $square_4 && $square_5 && $square_6 && $square_7 && $square_8 && $square_9 ){
            if (!$this->tie){
                $this->tie = true;
                $this->save();
            }
            return true;
        }
    }

    public function isGameWon()
    {
        if ($this->O_won){
            $turn = 'O';
        } else if ($this->X_won){
            $turn = 'X';
        } else if ($this->tied){
            return false;
        } else {
            $turn = $this->turn;
        }
        
        /* We obtain the values */
        $square_1 = $this->square_1;
        $square_2 = $this->square_2;
        $square_3 = $this->square_3;
        $square_4 = $this->square_4;
        $square_5 = $this->square_5;
        $square_6 = $this->square_6;
        $square_7 = $this->square_7;
        $square_8 = $this->square_8;
        $square_9 = $this->square_9;
        /* */
        $list = [];
        /* We verify if a player won */
        if ($square_1 === $turn && $square_4 === $turn && $square_7 === $turn){
            $list = ['square_1', 'square_4', 'square_7'];
        }
        if ($square_2 === $turn && $square_5 === $turn && $square_8 === $turn){
            $list = ['square_2', 'square_5', 'square_8'];
        }
        
        if ($square_3 === $turn && $square_6 === $turn && $square_9 === $turn){
            $list = ['square_3', 'square_6', 'square_9'];
        }
    
        if ($square_1 === $turn && $square_2=== $turn && $square_3 === $turn){
            $list = ['square_1', 'square_2', 'square_3'];
        }
        if ($square_4 === $turn && $square_5 === $turn && $square_6 === $turn){
            $list = ['square_4', 'square_5', 'square_6'];
        }
        if ($square_7 === $turn && $square_8 === $turn && $square_9 === $turn){
            $list = ['square_7', 'square_8', 'square_9'];
        }
    
        if ($square_1 === $turn && $square_5 === $turn && $square_9 === $turn){
            $list = ['square_1', 'square_5', 'square_9'];
        }
        if ($square_3 === $turn && $square_5 === $turn && $square_7 === $turn){
            $list = ['square_3', 'square_5', 'square_7'];
        }

        if ($list){
            if ($turn === 'O' && !$this['O_won']){
                $this['O_won'] = true;
                $this->save();
            } else if ($turn === 'X' && !$this['X_won']) {
                $this['X_won'] = true;
                $this->save();
            }
            return $list;
            
        }

        return false;
    }

}

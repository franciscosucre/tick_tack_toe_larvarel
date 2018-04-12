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
}

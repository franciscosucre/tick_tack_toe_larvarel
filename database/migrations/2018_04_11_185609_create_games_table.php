<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('square_1',['X', 'O'])->nullable();
            $table->enum('square_2',['X', 'O'])->nullable();
            $table->enum('square_3',['X', 'O'])->nullable();
            $table->enum('square_4',['X', 'O'])->nullable();
            $table->enum('square_5',['X', 'O'])->nullable();
            $table->enum('square_6',['X', 'O'])->nullable();
            $table->enum('square_7',['X', 'O'])->nullable();
            $table->enum('square_8',['X', 'O'])->nullable();
            $table->enum('square_9',['X', 'O'])->nullable();
            $table->enum('turn',['X', 'O'])->default('X');
            $table->boolean('X_won')->default(false);
            $table->boolean('O_won')->default(false);
            $table->boolean('tie')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

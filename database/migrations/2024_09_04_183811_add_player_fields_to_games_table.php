<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlayerFieldsToGamesTable extends Migration
{
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('player_x')->nullable();
            $table->string('player_o')->nullable();
        });
    }

    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['player_x', 'player_o']);
        });
    }
}

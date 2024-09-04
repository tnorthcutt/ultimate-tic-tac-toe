<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'board', 'current_player', 'winner', 'player_x', 'player_o'];

    protected $casts = [
        'board' => 'array',
    ];
}

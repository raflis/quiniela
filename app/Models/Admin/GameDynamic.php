<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameDynamic extends Model
{
    use HasFactory;

    protected $table = 'game_dynamics';

    protected $fillable = [
        'name', 'slug', 'image', 'body', 'points', 'end_time', 'order', 'draft',
    ];
    
}

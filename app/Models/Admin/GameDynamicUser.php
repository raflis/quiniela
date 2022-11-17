<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameDynamicUser extends Model
{
    use HasFactory;

    protected $table = 'game_dynamic_user';

    protected $fillable = [
        'game_dynamic_id', 'user_id', 'file', 'validate',
    ];

    public function game_dynamic()
    {
        return $this->belongsTo(GameDynamic::class, 'game_dynamic_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}

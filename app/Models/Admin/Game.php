<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'team1_id', 'team2_id', 'score1', 'score2', 'match_date', 'phase',
    ];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id', 'id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id', 'id');
    }
    
}

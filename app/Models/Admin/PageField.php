<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    use HasFactory;

    protected $table = 'page_fields';

    protected $casts = [
        //'workshops_images' => 'array',
    ];

    protected $fillable = [
        'logo', 'footer_text', 'game_points', 'terms', 'policy',
        'end_phase16', 'end_phase8', 'end_phase4', 'end_phase2', 'end_phase1',
    ];
}

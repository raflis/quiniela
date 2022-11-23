<?php

namespace App\Models;

use App\Models\Admin\Sale;
use App\Models\Admin\Result;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Admin\GameDynamicUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'role',
        'name',
        'lastname',
        'birthday',
        'avatar',
        'email',
        'points',
        'points1',
        'points_total',
        'password',
        'country',
        'position',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function game_dynamics()
    {
        return $this->hasMany(GameDynamicUser::class);
    }
}

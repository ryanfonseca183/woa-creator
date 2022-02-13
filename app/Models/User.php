<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'email_verified_at', 
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function portfolios() {
        return $this->hasMany('App\Models\Portfolio', 'user_id');
    }
    public function trabalhos() {
        return $this->hasMany('App\Models\Trabalho', 'user_id');
    }
    public function cursos() {
        return $this->hasMany('App\Models\Curso', 'user_id');
    }
    public function getPictureAttribute() {
        return $this->avatar ? 'storage/' . $this->avatar : 'img/user.png';
    }
    public function curtidas() {
        return $this->hasMany(Curtida::class, 'user_id');
    }
    public function avaliacoes() {
        return $this->belongsToMany('App\Models\Trabalho', 'curtida', 'user_id', 'trabalho_id');
    }
}

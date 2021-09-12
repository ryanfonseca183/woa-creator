<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'visivel',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'visualizacoes' => 'int',
        'curtidas' => 'int',
    ];

    public function ocupacoes() {
        return $this->hasMany('App\Models\Ocupacao', 'portifolio_id');
    }
    public function avaliacoes() {
        return $this->hasMany('App\Models\Avaliacoa', 'portfolio_id');
    }
    public function user() {
        return $this->belongsTo('App\Models\User', 'users_id');
    }
}

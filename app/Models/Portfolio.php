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
        return $this->hasMany(Ocupacao::class, 'portifolio_id');
    }
    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class, 'portfolio_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function cursos() {
        return $this->belongsToMany(Curso::class, 'curso_portfolio', 'portfolio_id', 'curso_id');
    }
}

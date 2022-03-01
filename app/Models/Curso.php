<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "curso";

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['user_id', 'padrao'];

    public function portfolios() {
        return $this->belongsToMany(Portfolio::class, 'curso_portfolio', 'curso_id', 'portfolio_id');
    }
    public function getInicioAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $this->data_inicio)->format('d/m/Y');
    }
    public function getTerminoAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $this->data_termino)->format('d/m/Y');
    }
}

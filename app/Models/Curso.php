<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

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
}

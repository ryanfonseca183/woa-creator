<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacao extends Model
{
    use HasFactory;

    protected $table = 'ocupacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'visivel'];

    public function portfolio() {
        return $this->belongsTo('App\Models\Portfolio', 'portfolio_id');
    }
    public function trabalhos() {
        return $this->hasMany('App\Models\Trabalho', 'ocupacao_id');
    }
}

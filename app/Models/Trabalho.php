<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabalho extends Model
{
    use HasFactory;

    protected $table = 'trabalho';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descricao'];

    public function ocupacao() {
        return $this->belongsTo('App\Models\Ocupacao', 'ocupacao_id');
    }
    public function midias() {
        return $this->hasMany('App\Models\Ocupacao', 'trabalho_id');
    }
}

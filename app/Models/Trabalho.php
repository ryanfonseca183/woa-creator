<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabalho extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'trabalho';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descricao', 'visivel', 'user_id'];

    public function ocupacao() {
        return $this->belongsTo('App\Models\Ocupacao', 'ocupacao_id');
    }
    public function midias() {
        return $this->hasMany('App\Models\Midia', 'trabalho_id');
    }
    public function scopeVisivel($query) {
        return $query->where('visivel', 1);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'valor' => 'int',
    ];

    public function portfolio() {
        return $this->belongsTo('App\Models\Portfolio', 'portfolio_id');
    }
    public function usuario() {
        return $this->belongsTo('App\Models\Usuario', 'users_id');
    }
}

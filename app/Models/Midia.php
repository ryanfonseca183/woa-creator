<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    use HasFactory;

    protected $table = 'midia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url_midia', 'descricao', 'e_principal'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'e_principal' => 'boolean',
    ];
    public function scopePrincipal($query) {
        return $query->where('principal', 1);
    }
    public function trabalho() {
        return $this->belongsTo('App\Models\Trabalho', 'trabalho_id'); 
    }
}

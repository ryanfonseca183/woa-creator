<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtida extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected $table = "curtida";

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function trabalho() {
        return $this->belongsTo(Trabalho::class, 'trabalho_id');
    }
}

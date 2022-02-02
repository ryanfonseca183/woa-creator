<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsuarioController extends Controller
{
    public function trabalhos($id = null) {
        if(Auth::check() && (!$id || Auth::id() == $id)) {
            return view('user.perfil');
        }
        $usuario = User::with([
            'trabalhos' => function($query) { 
                return $query->visivel(); 
            },
            'trabalhos.midias' 
        ])->findOrFail($id);
       
        return view('user.show.work', compact('usuario'));
    }
    public function portfolios($id = null) {
        if(Auth::check() && Auth::id() == $id) {
            return redirect()->route('portfolios.index');
        }
        $usuario = User::with([
            'portfolios' => function($query) { 
                return $query->visivel(); 
            }
        ])->findOrFail($id);
        
        return view('user.show.portfolio.index', compact('usuario'));
    }
    public function portfolio($usuario, $portfolio) {
        if(Auth::check() && Auth::id() == $usuario) {
            return redirect()->route('portfolios.edit', $portfolio);
        }
        $usuario = User::findOrFail($usuario);
        $portfolio = $usuario->portfolios()->visivel()->findOrFail($portfolio);
        $portfolio->load([
            'ocupacoes' => function($query) {
                return $query->visivel();
            },
            'ocupacoes.trabalhos' => function($query) {
                return $query->visivel();
            },
            'ocupacoes.trabalhos.midias',
            'cursos',
        ]);
        
        return view('user.show.portfolio.show', compact('portfolio', 'usuario'));
    }
}

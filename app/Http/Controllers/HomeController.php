<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $trabalhos = Trabalho::visivel()->orderBy('total_curtidas', 'desc')->orderBy('total_visualizacoes', 'desc')->take(3)->get();

        $artistas = User::select(DB::raw('users.nome, users.nome_artistico, users.descricao, users.avatar, users.cidade, users.estado, sum(trabalho.total_visualizacoes) as trabalhos_visualizacoes_sum, sum(trabalho.total_curtidas) as trabalhos_curtidas_sum'))
                        ->join('trabalho', 'users.id', '=', 'trabalho.user_id')
                        ->whereNotNull('users.descricao')
                        ->groupBy('users.id')
                        ->orderBy('trabalhos_curtidas_sum', 'desc')
                        ->orderBy('trabalhos_visualizacoes_sum', 'desc')
                        ->get();

        return view('welcome', compact(['trabalhos', 'artistas']));
    }
}

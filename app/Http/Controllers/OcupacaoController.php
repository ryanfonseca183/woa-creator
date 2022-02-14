<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class OcupacaoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $portfolio, $ocupacao)
    {
        $ocupacao =  $request->user()->portfolios()->findOrFail($portfolio)->ocupacoes()->findOrFail($ocupacao);
        return view('ocupacao.show', compact('ocupacao'));
    }
}

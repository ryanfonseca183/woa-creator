<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NavegacaoController extends Controller
{
    public function __invoke(Request $request)
    {
        //Define as opções de ordenamento
        $orderBy = [
            1 => ['Mais vistos', 'total_visualizacoes'],
            2 => ['Mais curtidos', 'total_curtidas'],
        ];
        //Define as opções de quantidade de itens listados
        $itemsCount = [10, 20, 30];

        //Valida os parametros
        $validated = array_merge(['orderBy' => 'total_curtidas', 'itemsCount' => 10, 'search_type' => 'trabalho'], $request->validate([
            'search_type' => 'nullable|string|in:artista,trabalho',
            'search_text' => 'nullable|string|max:45',
            'orderBy' => 'nullable|string|in:total_visualizacoes,total_curtidas',
            'itemsCount' => 'nullable|integer|in:10,20,30',
        ]));

        //Cria a query 
        $collection = $validated['search_type'] == "artista"
                        ? $this->searchArtists($validated) 
                        : $this->searchWorks($validated); 
        
        //Realiza a paginação dos resultados
        $collection = $collection->paginate($validated['itemsCount']);

        //Adiciona os filtros de pesquisa aos links de paginação
        $collection->appends($validated);

        return view('navegacao', compact(['orderBy', 'itemsCount', 'collection', 'validated']));    
    }
    public function searchWorks($validated) {
        $text = $validated['search_text'] ?? "";

        return Trabalho::when($text, function($query, $text){
                foreach(explode(' ', $text) as $text) {
                    return $query->where('titulo', 'like', "%". $text . "%");
                }
            })
            ->visivel()
            ->with(['midias' => function($query) {
                return $query->orderBy('principal', 'desc');
            }])
            ->orderBy($validated['orderBy'], 'desc');
    }
    public function searchArtists($validated) {
        $nome = $validated['search_text'] ?? "";
        
        return User::when($nome, function($query, $nome){
                foreach(explode(' ', $nome) as $nome) {
                    return $query->where('nome', 'like', "%". $nome . "%");
                }
                })->when(Auth::check(), function($query) {
                    return $query->where('id', '!=', Auth::id());
                })
                ->withSum('trabalhos', 'total_visualizacoes')
                ->withSum('trabalhos', 'total_curtidas')
                ->orderBy($validated['orderBy'] == "total_curtidas" ? 'trabalhos_sum_total_curtidas' : 'trabalhos_sum_total_visualizacoes', 'desc');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;
use App\Models\Ocupacao;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Storage;

class TrabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadModels($portfolio, $ocupacao, $trabalho = null) {
        $portfolio = auth()->user()->portfolios()->findOrFail($portfolio);
        $ocupacao = $portfolio->ocupacoes()->findOrFail($ocupacao);
        $trabalhos = $trabalho ? $ocupacao->trabalhos()->findOrFail($trabalho)
                               : $ocupacao->trabalhos;

        return [$portfolio, $ocupacao, $trabalhos];
    }
    public function index($portfolio, $ocupacao)
    {
        return view('trabalhos.index', array_combine(
            ['portfolio', 'ocupacao', 'trabalhos'], 
            $this->loadModels($portfolio, $ocupacao)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($portfolio, $ocupacao)
    {
        return view('trabalhos.create', compact('ocupacao', 'portfolio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $portfolio, $ocupacao)
    {
        [$portfolio, $ocupacao] = $this->loadModels($portfolio, $ocupacao);

        //Realiza a validação dos campos
        $validated = $request->validate([
            'titulo' => 'required|string|max:45',
            'descricao' => 'required|string|max:255',
            'visivel' => 'nullable|boolean',
            'filepond' => 'required|array',
            'filepond.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        //Armazena o trabalho no banco
        $trabalho = $ocupacao->trabalhos()->create($validated);

        //Armazena as imagens relacionadas
        foreach($validated['filepond'] as $file) {
            $trabalho->midias()->create(['url_midia' => $file->store('images', 'public')]);
        }
        return redirect()->route('trabalhos.edit', $trabalho);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabalho $trabalho)
    {
        return view('trabalhos.edit', compact('trabalho'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabalho $trabalho)
    {
        //Realiza a validação dos campos
        $validated = $request->validate([
            'titulo' => 'required|string|max:45',
            'descricao' => 'required|string|max:255',
            'visivel' => 'nullable|boolean',
            'filepond' => 'required|array',
            'filepond.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $trabalho->update($validated);

        //Deleta as midias anteriores do storage
        Storage::disk('public')->delete($trabalho->midias->pluck('url_midia')->toArray());

        //Deleta as midias anteriores do banco de dados
        $trabalho->midias()->delete();

        //Armazena as novas midias
        foreach($validated['filepond'] as $file) {
            $trabalho->midias()->create(['url_midia' => $file->store('images', 'public')]);
        }
        return redirect()->route('trabalhos.edit', $trabalho);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabalho $trabalho)
    {
        $ocupacao = $trabalho->ocupacao;

        $trabalho->delete();

        return redirect()->route('portfolios.ocupacoes.show', [$ocupacao->id, $ocupacao->portfolio_id]);
    }
}

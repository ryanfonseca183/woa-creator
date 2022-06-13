<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;
use App\Models\Ocupacao;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Storage;

class TrabalhoController extends Controller
{
   
    public function loadModels($portfolio, $ocupacao, $trabalho = null) {
        $portfolio = auth()->user()->portfolios()->findOrFail($portfolio);
        $ocupacao = $portfolio->ocupacoes()->findOrFail($ocupacao);
        $trabalhos = $trabalho ? $ocupacao->trabalhos()->findOrFail($trabalho)
                               : $ocupacao->trabalhos;

        return [$portfolio, $ocupacao, $trabalhos];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        [$portfolio, $ocupacao] = $this->loadModels($portfolio, $ocupacao);

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
            'filepond.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        //Armazena o trabalho no banco
        $trabalho = $ocupacao->trabalhos()->create(array_merge(['user_id' => $request->user()->id], $validated));

        //Armazena as imagens relacionadas
        foreach($validated['filepond'] as $key => $file) {
            $trabalho->midias()->create([
                'url_midia' => $file->store('images', 'public'),
                'principal' => $key == 1 ? 1 : 0
            ]);
        }
        return redirect()->route('trabalhos.edit', $trabalho);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trabalho $trabalho)
    {
        abort_if(!$trabalho->visivel, 404);
        $user = $request->user();
        $visualizacao = $user ? $trabalho->visualizacoes()->where('user_id', $user->id) 
                              : $trabalho->visualizacoes()->where('ip', $request->ip());

        if(!$visualizacao->exists()) {
            $trabalho->visualizacoes()->create(['user_id' => $user->id ?? null, 'ip' => $request->ip()]);
            $trabalho->increment('total_visualizacoes');
        }

        return view('trabalhos.show', compact('trabalho'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Trabalho $trabalho)
    {
        abort_if($trabalho->user_id != $request->user()->id, 403);

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
            'descricao' => 'required|string',
            'visivel' => 'nullable|boolean',
            'filepond' => 'required|array',
            'filepond.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);
        $trabalho->update($validated);

        //Deleta as midias anteriores do storage
        Storage::disk('public')->delete($trabalho->midias->pluck('url_midia')->toArray());

        //Deleta as midias anteriores do banco de dados
        $trabalho->midias()->delete();

        //Armazena as novas midias
        foreach($validated['filepond'] as $key => $file) {
            $trabalho->midias()->create([
                'url_midia' => $file->store('images', 'public'),
                'principal' => $key == 1 ? 1 : 0
            ]);
        }
        return redirect()->route('trabalhos.edit', $trabalho);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabalho  $trabalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $trabalho)
    {
        $trabalho = $request->user()->trabalhos()->findOrFail($trabalho);

        $ocupacao = $trabalho->ocupacao;

        $trabalho->delete();

        return redirect()->route('portfolios.ocupacoes.show', [$ocupacao->portfolio_id, $ocupacao->id]);
    }
}

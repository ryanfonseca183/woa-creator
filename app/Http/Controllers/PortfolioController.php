<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = auth()->user()->portfolios;

        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:45',
            'visivel' => 'nullable|boolean',
            'capa' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        //Armazena a capa no storage
        $validated['capa'] = $validated['capa']->store('capas', 'public');

        //Cria o portfolio
        $portfolio = auth()->user()->portfolios()->create($validated);

        return redirect()->route('portfolios.edit', $portfolio->id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = auth()->user()->portfolios()->where('id', $id)->firstOrFail();

        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:45',
            'visivel' => 'nullable|boolean',
            'capa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        //Recupera os dados do portfolio
        $portfolio = auth()->user()->portfolios()->findOrFail($id);

        if(isset($validated['capa'])) {
            //Deleta a capa anterior do storage
            Storage::disk('public')->delete($portfolio->capa);

            //Armazena a nova capa no storage
            $validated['capa'] = $validated['capa']->store('capas', 'public');
        }
        
        //Atualiza os dados do portfolio
        $portfolio->update(array_merge(['visivel' => 0], $validated));

        return redirect()->route('portfolios.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->portfolios()->where('portfolio.id', $id)->delete();

        return redirect()->route('portfolios.index');
    }
}

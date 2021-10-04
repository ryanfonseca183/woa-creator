<?php

namespace App\Http\Livewire\Portfolio\Ocupation;

use Livewire\Component;
use App\Models\Ocupacao;

class Create extends Component
{
    public $portfolio, $nome, $visivel = 1;
    
    protected $rules = [
        'nome' => 'required|string|max:80|unique:ocupacao,nome',
        'visivel' => 'nullable|boolean',
    ];

    public function save() {
        $validated = $this->validate();

        $this->portfolio->ocupacoes()->create($validated);

        $this->reset();

        $this->emit('ocupationSaved');
    }

    public function render()
    {
        return view('livewire.portfolio.ocupation.create');
    }
}

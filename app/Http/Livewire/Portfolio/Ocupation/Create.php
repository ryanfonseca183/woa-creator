<?php

namespace App\Http\Livewire\Portfolio\Ocupation;

use Livewire\Component;

class Create extends Component
{
    public $portfolio, $nome, $visivel = 1;
    
    protected $rules = [
        'nome' => 'required|string|max:80|unique:ocupacao,nome,null,id,deleted_at,null',
        'visivel' => 'nullable|boolean',
    ];

    public function save() {
        $validated = $this->validate();

        $this->portfolio->ocupacoes()->create($validated);

        $this->reset(['nome', 'visivel']);

        $this->emit('ocupationSaved');
    }

    public function render()
    {
        return view('livewire.portfolio.ocupation.create');
    }
}

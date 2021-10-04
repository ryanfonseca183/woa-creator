<?php

namespace App\Http\Livewire\Portfolio\Ocupation;

use Livewire\Component;
use App\Models\Ocupacao;

class Edit extends Component
{
    public $portfolio, $ocupacao;

    protected $listeners = ['updateOcupationModalOpened' => 'mount'];

    public function mount($id = null) {
        $this->ocupacao =  $id ? $this->portfolio->ocupacoes()->where('ocupacao.id', $id)->firstOrFail()
                               : new Ocupacao;
    }
    protected function rules() {
        return [
            'ocupacao.nome' => "required|string|max:80|unique:ocupacao,nome," . $this->ocupacao->id .",id",
            'ocupacao.visivel' => 'nullable|boolean',
        ];
    }

    public function save() {
        $this->validate();

        $this->ocupacao->save();

        $this->emit('ocupationUpdated');
    }
    public function render()
    {
        return view('livewire.portfolio.ocupation.edit');
    }
}

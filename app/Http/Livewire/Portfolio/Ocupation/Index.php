<?php

namespace App\Http\Livewire\Portfolio\Ocupation;

use Livewire\Component;

class Index extends Component
{
    public $portfolio;

    protected $listeners = ['ocupationSaved' => '$refresh', 'ocupationUpdated' => '$refresh', 'ocupationDeleted' => '$refresh'];

    public function deleteOcupation($id) {
        $ocupacao = $this->portfolio->ocupacoes()->findOrFail($id);
        
        //Deleta os trabalhos
        $ocupacao->trabalhos()->delete();

        //Deleta as ocupações
        $ocupacao->delete();

        $this->emit('ocupationDeleted');
    }
    public function render()
    {
        return view('livewire.portfolio.ocupation.index');
    }
}

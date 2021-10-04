<?php

namespace App\Http\Livewire\Portfolio\Ocupation;

use Livewire\Component;

class Index extends Component
{
    public $portfolio;

    protected $listeners = ['ocupationSaved' => '$refresh', 'ocupationUpdated' => '$refresh', 'ocupationDeleted' => '$refresh'];

    public function deleteOcupation($id) {
        $this->portfolio->ocupacoes()->where('ocupacao.id', $id)->delete();
        $this->emit('ocupationDeleted');
    }
    public function render()
    {
        return view('livewire.portfolio.ocupation.index');
    }
}

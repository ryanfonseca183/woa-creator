<?php

namespace App\Http\Livewire\Portfolio\Ocupation\Work;

use Livewire\Component;

class Index extends Component
{
    public $ocupation, $current, $total;

    public function mount($ocupation) {
        $this->ocupation = $ocupation;
        $this->total = $ocupation->trabalhos()->visivel()->count();
        $this->current = 1;
    }
    public function prev() {
        $this->current = $this->current <= 1 ? $this->total : $this->current - 1;
    }
    public function next() {
        $this->current = $this->current >= $this->total ? 1 : $this->current + 1;
    }
    public function getTrabalhoProperty() {
        return $this->ocupation->trabalhos()->offset($this->current - 1)->limit(1)->first();
    }
    public function render()
    {
        return view('livewire.portfolio.ocupation.work.index');
    }
}

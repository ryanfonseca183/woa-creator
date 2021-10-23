<?php

namespace App\Http\Livewire\Portfolio\Courses;

use Livewire\Component;
use App\Models\Curso;

class Create extends Component
{
    public $portfolio, $curso;

    public function mount() {
        $this->curso = new Curso;
    }
    protected $rules = [
        'curso.instituicao' => 'required|string|max:180',
        'curso.diploma' => 'nullable|string|max:45',
        'curso.area' => 'required|string|max:180',
        'curso.data_inicio' => 'required|date_format:Y-m-d',
        'curso.descricao' => 'required|string',
        'curso.data_termino' => 'required|date_format:Y-m-d|after:curso.data_inicio',
    ];
    public function save() {
        $this->validate();
        //Salva o curso no banco
        $this->curso->save();
        //Vincula ao portfolio
        $this->portfolio->cursos()->attach($this->curso->id);
        //Leva as propriedades ao estado inicial
        $this->reset(['curso']);
        //Emite o evento
        $this->emit('courseSaved');
    }
    public function render()
    {
        return view('components.courses.create');
    }
}

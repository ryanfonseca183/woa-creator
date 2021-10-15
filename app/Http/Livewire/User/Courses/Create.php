<?php

namespace App\Http\Livewire\User\Courses;

use Livewire\Component;
use App\Models\Curso;

class Create extends Component
{
    public $curso;

    public function mount() {
        $this->curso = new Curso;
    }
    protected $rules = [
        'curso.instituicao' => 'required|string|max:180',
        'curso.diploma' => 'nullable|string|max:45',
        'curso.area' => 'required|string|max:180',
        'curso.data_inicio' => 'required|date_format:Y-m-d',
        'curso.data_termino' => 'required|date_format:Y-m-d|after:curso.data_inicio',
        'curso.descricao' => 'required|string',
    ];
    public function save() {
        $this->validate();
        //Vincula ao portfolio
        auth()->user()->cursos()->save($this->curso);
        //Leva as propriedades ao estado inicial
        $this->curso = new Curso;
        //Emite o evento
        $this->emit('courseSaved');
    }
    public function render()
    {
        return view('components.courses.create');
    }
}

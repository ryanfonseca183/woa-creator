<?php

namespace App\Http\Livewire\Portfolio\Courses;

use Livewire\Component;
use App\Models\Curso;

class Edit extends Component
{
    public $portfolio, $curso, $padrao;

    protected $listeners = ['modalUpdateOpened' => 'loadCourse'];

    public function mount() {
        $this->curso = new Curso;
    }
    public function loadCourse($cursoId) {
        $this->curso = $this->portfolio->cursos()->where('curso.id', $cursoId)->firstOrFail();
    }
    protected $rules = [
        'curso.instituicao' => 'required|string|max:180',
        'curso.diploma' => 'nullable|string|max:45',
        'curso.area' => 'required|string|max:180',
        'curso.data_inicio' => 'required|date_format:Y-m-d',
        'curso.descricao' => 'required|string',
        'curso.data_termino' => 'required|date_format:Y-m-d|after:data_inicio',
        'padrao' => 'nullable|boolean',
    ];

    public function save() {
        //Valida os campos
        $this->validate();
        //Salva as alterações
        $this->curso->save();
        //Emite o evento
        $this->emit('courseSaved');
    }
    public function render()
    {
        return view('livewire.portfolio.courses.edit');
    }
}

<?php

namespace App\Http\Livewire\User\Courses;

use Livewire\Component;
use App\Models\Curso;

class Edit extends Component
{
    public $curso;

    protected $listeners = ['updateCourseModalOpened' => 'mount'];

    public function mount($id = null) {
        $this->curso = $id ? auth()->user()->cursos()->findOrFail($id)
                           : new Curso;
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

        //Valida os campos
        $this->validate();
        //Salva as alterações
        $this->curso->save();
        //Emite o evento
        $this->emit('courseUpdated');
    }
    public function render()
    {
        return view('components.courses.edit');
    }
}

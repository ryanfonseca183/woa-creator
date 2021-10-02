<?php

namespace App\Http\Livewire\Portfolio\Courses;

use Livewire\Component;
use App\Models\Curso;

class Create extends Component
{
    public $portfolio, $instituicao, $diploma, $area, $data_inicio, $data_termino, $descricao, $padrao;

    protected $rules = [
        'instituicao' => 'required|string|max:180',
        'diploma' => 'nullable|string|max:45',
        'area' => 'required|string|max:180',
        'data_inicio' => 'required|date_format:Y-m-d',
        'descricao' => 'required|string',
        'data_termino' => 'required|date_format:Y-m-d|after:data_inicio',
        'padrao' => 'nullable|boolean',
    ];
    public function save() {
        //Valida os campos
        $validated = $this->validate();
        //Recupera os dados do portfolio
        $curso = new Curso;
        $curso->fill($validated);
        //Vincula a conta do usuário
        if($validated['padrao']) {
            $curso->user_id = auth()->user()->id;
        }
        $curso->save();
        //Vincula ao portfolio
        $this->portfolio->cursos()->attach($curso->id);
        //Leva as propriedades ao estado inicial
        $this->reset();
        //Emite o evento
        $this->emit('courseSaved');
    }
    public function render()
    {
        return view('livewire.portfolio.courses.create');
    }
}

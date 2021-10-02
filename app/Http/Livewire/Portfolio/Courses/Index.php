<?php

namespace App\Http\Livewire\Portfolio\Courses;

use Livewire\Component;
use App\Models\Portfolio;

class Index extends Component
{
    public $portfolio, $cursos = [];

    public function mount() {
        $this->cursos = $this->portfolio->cursos()->select('curso.id')->whereNotNull('curso.user_id')->get()->map(function($item){
            return $item->id . "";
        })->toArray();
    }
    protected $listeners = ['courseSaved' => '$refresh'];

    public function deleteCourse($id) {
        $this->portfolio->cursos()->detach($id);
    }
    protected function arrayDiff($A, $B) {
        $intersect = array_intersect($A, $B);
        return array_merge(array_diff($A, $intersect), array_diff($B, $intersect));
    }
    public function updatingCursos($value) {
        //Recupera o curso sendo manipulado
        $curso = $this->arrayDiff($this->cursos, $value);
        $curso = array_shift($curso);

        //Verifica se o curso pertence ao usuário
        if(!auth()->user()->cursos()->where('id', $curso)->exists()) return;
        
        //Vincula ou remove o curso do portfolio
        if(count($this->cursos) > count($value)) {
            $this->portfolio->cursos()->detach($curso);
        } else {
            $this->portfolio->cursos()->attach($curso);
        }
    }
    
    public function render()
    {
        return view('livewire.portfolio.courses.index');
    }
}

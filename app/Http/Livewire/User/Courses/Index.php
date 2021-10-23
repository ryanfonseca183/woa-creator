<?php

namespace App\Http\Livewire\User\Courses;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['courseSaved' => '$refresh', 'courseDeleted' => '$refresh', 'courseUpdated' => '$refresh'];

    public function deleteCourse($id) {
        auth()->user()->cursos()->where('id', $id)->delete();

        $this->emit('courseDeleted');
    }
    public function render()
    {
        return view('livewire.user.courses.index');
    }
}

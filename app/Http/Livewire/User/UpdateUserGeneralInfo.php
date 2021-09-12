<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UpdateUserGeneralInfo extends Component
{
    public $nome, $nome_artistico, $cidade, $estado, $descricao;

    public function mount() {
        $this->fill([
            'nome' => auth()->user()->nome,
            'nome_artistico' => auth()->user()->nome_artistico,
            'cidade' => auth()->user()->cidade,
            'estado' => auth()->user()->estado,
            'descricao' => auth()->user()->descricao,
        ]);
    }
    protected $rules = [
        'nome' => 'required|string|max:180',
        'nome_artistico' => 'required|string|max:180',
        'cidade' => 'required|string|max:45',
        'estado' => 'required|string|max:45',
        'descricao' => 'nullable|string|max:255',
    ];

    public function save() {
        $validated = $this->validate();

        auth()->user()->update($validated);

        $this->emit('userGeneralInfoUpdated');
    }
    public function render()
    {
        return view('livewire.user.update-user-general-info');
    }
}

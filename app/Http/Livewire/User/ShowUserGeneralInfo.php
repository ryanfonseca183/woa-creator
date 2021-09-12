<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ShowUserGeneralInfo extends Component
{
    protected $listeners = ['userGeneralInfoUpdated' => '$refresh'];
    
    public function render()
    {
        return view('livewire.user.show-user-general-info');
    }
}

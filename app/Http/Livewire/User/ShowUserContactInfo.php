<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ShowUserContactInfo extends Component
{
    protected $listeners = ['userContactInfoUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.user.show-user-contact-info');
    }
}

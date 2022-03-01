<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UpdateUserContactInfo extends Component
{
    public $url_facebook, $url_instagram, $url_twitter, $celular;

    public function mount() {
        $this->fill([
            'url_facebook' => auth()->user()->url_facebook,
            'url_instagram' => auth()->user()->url_instagram,
            'url_twitter' => auth()->user()->url_twitter,
            'celular' => auth()->user()->celular,
        ]);
    }
    protected $rules = [
        'url_facebook' => 'required|string|url|max:255',
        'url_instagram' => 'required|string|url|max:255',
        'url_twitter' => 'required|string|url|max:255',
        'celular' => 'required|string|max:15',
    ];

    public function save() {
        $validated = $this->validate();

        auth()->user()->update($validated);

        $this->emit('userContactInfoUpdated');
    }
    public function render()
    {
        return view('livewire.user.update-user-contact-info');
    }
}

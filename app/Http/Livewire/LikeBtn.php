<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curtida;
use App\Models\Trabalho;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeBtn extends Component
{
    public $trabalho;

    public function deslike() {
        if(Auth::user()->curtidas()->where('trabalho_id', $this->trabalho->id)->exists()) {
            $this->trabalho->curtidas()->where('user_id', Auth::id())->delete();
            $this->trabalho->decrement('total_curtidas');
        }
    }
    public function like() {
        if(!Auth::user()->curtidas()->where('trabalho_id', $this->trabalho->id)->exists()) {
            $this->trabalho->curtidas()->create(['user_id' => Auth::id()]);
            $this->trabalho->increment('total_curtidas');
        }
    }
    public function render()
    {
        return view('livewire.like-btn');
    }
}

<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class UploadAvatar extends Component
{
    use WithFileUploads;
 
    public $avatar;
 
    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);
        Storage::disk('public')->delete(auth()->user()->avatar);
        
        auth()->user()->update(['avatar' => $this->avatar->store('avatar', 'public')]);
    }

    public function render()
    {
        return view('livewire.user.upload-avatar');
    }
}

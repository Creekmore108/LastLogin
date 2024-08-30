<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class LastLogin extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.last-login');
    }
}

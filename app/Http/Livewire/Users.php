<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Users extends Component
{
    public $searchTerm = '';
    public $users;
    public function render()
    {
        
        return view('livewire.users');
    }
}

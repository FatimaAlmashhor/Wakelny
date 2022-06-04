<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $searchTerm = '';
    public $users;
    public function render()
    {
        $this->users = User::orderBy('id', 'desc')->get();
        return view('livewire.users');
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Posts;

class Post extends Component
{
    public $searchTerm ='';
    public $posts;

    public function render()
    {
        if (empty($this->searchTerm)) {
            $this->posts = Posts::all();
            // $this->posts = Posts::where('title', $this->searchTerm)->get();

        } else {
            $this->posts =Posts::where('title', 'like', '%'.$this->searchTerm.'%')->get();
        }
        return view('livewire.post');
    }
}

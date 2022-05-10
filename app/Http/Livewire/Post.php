<?php

namespace App\Http\Livewire;

use App\Models\category;
use Livewire\Component;
use App\Models\Posts;

class Post extends Component
{
    public $searchTerm = '';
    public $posts;



    public function render()
    {
        if (empty($this->searchTerm)) {
            $this->posts = Posts::all();
            $this->categories = category::get();
        } else {
            $this->posts = Posts::where('title', 'like', '%' . $this->searchTerm . '%')->get();
        }
        return view('livewire.post');
    }
}



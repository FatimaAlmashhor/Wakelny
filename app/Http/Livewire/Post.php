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
            $this->posts = Posts::select(
                'posts.id as post_id',
                'posts.user_id',
                'posts.title',
                'posts.offers',
                'posts.description',
                'profiles.name',
                'profiles.user_id as provider_id'
            )->join('profiles', 'profiles.user_id', '=', 'posts.user_id')->where('is_active', 1)->where('status', 'open')->orderBy('id', 'DESC')->get();
            $this->categories = category::get();
        } else {
            $this->posts = Posts::select(
                'posts.id as post_id',
                'posts.user_id',
                'posts.title',
                'posts.offers',
                'posts.description',
                'profiles.name',
                'profiles.user_id as provider_id'
            )->join('profiles', 'profiles.user_id', '=', 'posts.user_id')
                ->where('is_active', 1)
                ->where('status', 'open')
                ->where('title', 'like', '%' . $this->searchTerm . '%')
                ->orderBy('id', 'DESC')
                ->get();
        }
        return view('livewire.post');
    }
}



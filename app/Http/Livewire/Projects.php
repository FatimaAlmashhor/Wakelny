<?php

namespace App\Http\Livewire;

use App\Models\category;
use Livewire\Component;
use App\Models\Project;
use App\Models\Posts;
use App\Models\User;

class Projects extends Component
{
    public $term = '';
    public $project;

    public function render()
    {
        if (empty($this->term)) {
            $this->project = Project::select(
                'projects.id',
                'projects.stated_at',
                'projects.duration',
                'projects.status',
                'projects.amount',
                'reportesr.name as reporter',
                'reporteds.name as reported',
                // 'projects.title',
                //  'projects.seeker_id ',
                //  'projects.user_id ',
                'posts.title'
            )
            ->join('profiles as reportesr', 'reportesr.user_id', '=', 'projects.seeker_id')
            ->join('profiles as reporteds', 'reporteds.user_id', '=', 'projects.provider_id')
            ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->where('posts.is_active', 1)->get();
        } else {
            $this->project = Project::select(
                'projects.id',
                'projects.stated_at',
                'projects.duration',
                'projects.status',
                'projects.amount',
                'reportesr.name as reporter',
                'reporteds.name as reported',
                // 'projects.title',
                //  'projects.seeker_id ',
                //  'projects.user_id ',
                'posts.title'
            )
            ->join('profiles as reportesr', 'reportesr.user_id', '=', 'projects.seeker_id')
            ->join('profiles as reporteds', 'reporteds.user_id', '=', 'projects.provider_id')
            ->join('posts', 'posts.id', '=', 'projects.post_id')
            ->where('title', 'like', '%' . $this->term . '%')
            ->orWhere('reportesr.name', 'like', '%' . $this->term . '%')
            ->orWhere('projects.status', 'like', '%' . $this->term . '%')


            ->where('posts.is_active', 1)->get();

        }
        return view('livewire.projects');
    }
}



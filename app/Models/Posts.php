<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desciption',
        'cost',
        'duration',
        'status',
        'offers',
        'is_active' 
    ];
}

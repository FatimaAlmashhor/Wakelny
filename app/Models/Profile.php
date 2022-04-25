<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'name',
        'gender',
        'country',
        'mobile',
        'specialization',
       'bio',
       'category_id'
    ];

      public function getAvatarAttribute($value){
        return url("images/")."/".$value;

    }
}

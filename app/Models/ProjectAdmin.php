<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAdmin extends Model
{
    use HasFactory;

  

 public function seeker()
    {
        return $this->belongsTo(User::class, 'seeker_id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function post()
    {
        return $this->hasMany(Posts::class);
    }
    // public function seeker()
    // {
    //     return $this->belongsTo(User::class, 'seeker_id');
    // }

    // public function provider()
    // {
    //     return $this->belongsTo(User::class, 'provider_id');
    // }

    // public function post()
    // {
    //     return $this->hasMany(Posts::class);
    // }
}

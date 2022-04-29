<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    use HasFactory;
    protected $fillable = [
        'more_file'
    ];
    public function getImageAttribute($value){
        return url("images/")."/".$value;

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'cost',
        'cost_after_taxs',
        'description',
        'is_active'
    ];
}

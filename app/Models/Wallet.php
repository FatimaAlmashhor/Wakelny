<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'holder_type',
        'holdet_id',
        'name',
        'slug',
        'uuid',
        'balance',
        'decimal_places'
    ];
}

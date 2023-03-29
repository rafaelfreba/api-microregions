<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = [
        'ibge',
        'name',
        'fu',
        'microregion',
        'poleMunicipality',
        'macroregion',
        'distance_from_pole_municipality',
        'distance_from_the_capital',
        'img_map'
    ];

    protected $hidden = [
        'status',
        'created_at',
        'updated_at'
    ];
}

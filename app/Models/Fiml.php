<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiml extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'director',
        'duracion',
        'genero',
        'año',
    ];
}

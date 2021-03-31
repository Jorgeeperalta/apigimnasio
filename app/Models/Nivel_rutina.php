<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_rutina extends Model
{
    use HasFactory;

    protected $table = 'nivel_rutina';

    protected $fillable = [

        'nombre_nivel',
        'detalle',
     
    ];
}
 
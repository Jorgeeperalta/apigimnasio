<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table='directorios';

    protected $fillable =[
        
        'nombreCompleto',
        'direction',
        'telefono',
        'foto',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function rules($isNew = true)
    {
        return [
            'nombreCompleto' => 'required|min:5|max:100',
            'telefono' => 'required|unique:directorios,telefono,' . ($isNew ? '' : request('directorio')->id)
        ];
    }
}

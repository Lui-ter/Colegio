<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    protected $table = 'estudiantes';
    // public $timestamps = false;
    protected $primaryKey = 'id_estudiante';
    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'direccion',
        'fecha_nacimiento',
        'tipo_documento',
        'numero_documento'
    ];

}

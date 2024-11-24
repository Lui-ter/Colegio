<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class acudientes extends Model
{
    protected $table = 'acudientes';
   // public $timestamps = false;
    protected $primaryKey = 'id_acudiente';
    protected $fillable = [
    'nombres',
    'apellidos',
    'correo',
    'direccion',
    'telefono',
    'fecha_nacimiento',
    'tipo_documento',
    'numero_documento',
    'estudiante_id'
    ];
    public function estudiante(){
        return $this->belongsTo(estudiantes::class,'estudiante_id', 'id_estudiante');
    }
}
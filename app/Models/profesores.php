<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    protected $table = 'profesores';
   // public $timestamps = false;
   protected $primaryKey = 'id_profesor';
   protected $fillable = [
    'nombres',
    'apellidos',
    'correo',
    'fecha_nacimiento',
    'telefono',
    'tipo_documento',
    'num_documento'
   ];
}

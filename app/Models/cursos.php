<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    protected $table = 'cursos';
   // public $timestamps = false;
   protected $primaryKey = 'id_curso';
   protected $fillable = [
    'nombre',
    'estudiante_id',
    'profesor_id',
   ];
}

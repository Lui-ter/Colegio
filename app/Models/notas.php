<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notas extends Model
{
    protected $table = 'notas';
   // public $timestamps = false;
   protected $primaryKey = 'id_nota';
   protected $fillable = [
    'nota1',
    'nota2',
    'nota3',
    'materia_id',
    'estudiante_id',
];
}

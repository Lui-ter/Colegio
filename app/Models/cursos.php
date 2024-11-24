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
    public function estudiante(){
        return $this->belongsTo(estudiantes::class,'estudiante_id', 'id_estudiante');
    }
    public function profesor(){
        return $this->belongsTo(profesores::class,'profesor_id', 'id_profesor');
    }
}
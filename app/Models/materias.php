<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    protected $table = 'materias';
    protected $fillable=[
        'nombre',
        'profesor_id'
    ];
  //  public $timestamps = false;
  protected $primaryKey = 'id_materia';


  public function profesor(){
    return $this->belongsTo(profesores::class,'profesor_id', 'id_profesor');
  }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\acudientes;
use App\Models\estudiantes;
use App\Models\profesores;
use App\Models\cursos;
use App\Models\notas;
use App\Models\materias;

class formulariosController extends Controller
{

    function registrarM(){
        return view ('formularios/registro_materia');
    }
    function guardarM(Request $request){
        $materia = new materias();
        $materia->nombre = $request->input('nombre');
        $materia->profesor_id = $request->input('profesor_id');
        $materia->save();
        return view('home');
    }
  
     function login(){
        return view ('formularios/login');
     }

     
}


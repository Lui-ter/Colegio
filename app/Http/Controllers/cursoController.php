<?php

namespace App\Http\Controllers;

use App\Models\cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class cursoController extends Controller
{
    //Metodo para mostrar interfaz y sus registros
    function inicio () {
        $curso = cursos::where('estado', 1)->get();
        return view ('interfaces/cursos/curso',['cursos'=>$curso]);
    }

    //Metodo para mostrar formulario
    function registrarC(){
        return view('interfaces/cursos/registro_curso');
    }

    //Metodo para recibir y guardar los datos del formulario
    function guardarC(Request $request){
        $curso = new cursos();
        $curso->nombre = $request->input('nombre');
        $curso->profesor_id = $request->input('profesor_id');
        $curso->estudiante_id = $request->input('estudiante_id');
        $curso->save();
        return redirect('curso_interfaz');
    }

    function eliminar($id_curso){
        $curso = cursos::find($id_curso);
        $curso->estado= 0;
        $curso->save();
        return redirect('curso_interfaz');
    }

    function recuperar($id_curso){
        $curso = cursos::find($id_curso);
        $curso->estado= 1;
        $curso->save();
        return redirect('curso_interfaz');
    }

    function papeleria(){
        $curso = cursos::where('estado', 0)->get();
        return view('interfaces/cursos/papeleria_curso',['cursos'=>$curso]);

    }

    
}
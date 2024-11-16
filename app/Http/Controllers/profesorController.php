<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profesores;


class profesorController extends Controller
{
     // metodo para mostrar el interfaz y sus registros
    function inicio () {
        $profesores = profesores::where('estado', 1)->get();
        return view ('interfaces/profesores/profesor',compact('profesores'));
    }

    //Metodo para mostrar formulario
    function registrarP(){
        return view('interfaces/profesores/registro_profesor');
    }
    
    //Metodo para recibir y guardar los datos del formulario
    function guardarP(Request $request){
        $profesor = new profesores();
        $profesor->nombres = $request->input('nombre');
        $profesor->apellidos = $request->input('apellido');
        $profesor->correo = $request->input('correo');
        $profesor->fecha_nacimiento = $request->input('fecha_nacimiento');
        $profesor->telefono = $request->input('telefono');
        $profesor->tipo_documento = $request->input('tipo_documento');
        $profesor->num_documento = $request->input('numero_documento');
        $profesor->save();
        return redirect('profesor_interfaz');
    }



    //accede a la ruta papeleria
    function papelera(){
        $profesores = profesores::where('estado',0)->get();
        return view('interfaces/profesores/profesor_papeleria', compact('profesores'));
    }
    function recuperar($id_profesor){
        $profesores = profesores::find($id_profesor);
        $profesores->estado= 1;
        $profesores->save();
        return redirect('profesor_interfaz');
    }
    function eliminar($id_profesor){
        $profesores = profesores::find($id_profesor);
        $profesores->estado=0;
        $profesores->save();
        return redirect('profesor_interfaz');
    }
}


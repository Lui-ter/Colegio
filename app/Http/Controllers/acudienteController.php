<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\acudientes;
class acudienteController extends Controller
{
    // metodo para mostrar el interfaz y sus registros
    function inicio () {
        $acudientes = acudientes::where('estado',1)->get();
        return view('interfaces/acudientes/acudiente', ['registros'=>$acudientes]);
    }
     //Metodo para mostrar formulario
    function registrarA(){
        return view('interfaces/acudientes/registro_acudiente');
    }
     //Metodo para recibir y guardar los datos del formulario
    function guardarA(Request $request){
        $acudiente = new acudientes();
        $acudiente->nombres = $request->input('nombre');
        $acudiente->apellidos = $request->input('apellido');
        $acudiente->correo = $request->input('correo');
        $acudiente->direccion = $request->input('direccion');
        $acudiente->telefono = $request->input('telefono');
        $acudiente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $acudiente->tipo_documento = $request->input('tipo_documento');
        $acudiente->numero_documento = $request->input('numero_documento');
        $acudiente->estudiante_id = $request->input('estudiante_id');
        $acudiente->save();
        return redirect('acudiente_interfaz');
    }
}

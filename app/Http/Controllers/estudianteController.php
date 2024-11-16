<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;

class estudianteController extends Controller
{
    // metodo para consultar los datos existentes en la tabla estudiantes mientras la condicion sea que el estado sea 1 y mostrarlos en la vista interfaz estudiante 
    function inicio () {
    $estudiante = estudiantes::where('estado', 1)->get();
    return view ('interfaces/estudiantes/estudiante', ['estudiantes'=>$estudiante]);
    }

    // metodo para mostrar la vista del formulario-estudiante
    function registrarE (){
            return view('interfaces/estudiantes/registro_estudiante');
        }
    
    // metodo para registrar los datos que se reciben del formulario registro-estudiante y guardarlos en la tabla estudiantes y redirigir a la vista interfaz estudiante
    function guardarE(Request $request){      
            $estudiante = new estudiantes();
            $estudiante->nombres = $request->input('nombre');
            $estudiante->apellidos = $request->input('apellido');
            $estudiante->correo = $request->input('correo');
            $estudiante->direccion = $request->input('direccion');
            $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
            $estudiante->tipo_documento = $request->input('tipo_documento');
            $estudiante->numero_documento = $request->input('numero_documento');
            $estudiante->save();
            return redirect('estudiante_interfaz');
        }

    //Metodo para eliminar un registro
    function eliminar($id_estudiante){
        $estudiante = estudiantes::find($id_estudiante);
        $estudiante->estado=0;
        $estudiante->save();
        return redirect('estudiante_interfaz');
    }
    
    //Metodo papelera mostra una vista con los registros con el estado 0
    function papelera() {
        $estudiante = estudiantes::where('estado', 0)->get();
        return view('interfaces/estudiantes/papelera_estudiante', ['registros'=> $estudiante]);
    }

    //Metodo para recuperar campos de la papeleria
    function recuperar($id_estudiante){
        $estudiante = estudiantes::find($id_estudiante);
        $estudiante->estado= 1;
        $estudiante->save();
        return redirect('estudiante_interfaz');
    }


}
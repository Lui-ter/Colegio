<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\profesores;


class profesorController extends Controller
{
    // Metodo para mostrar el interfaz-profesor y sus registros donde el estado es 1
    function inicio () {
        $profesores = profesores::where('estado', 1)->get();
        return view ('interfaces/profesores/profesor',compact('profesores'));
    }

    // Metodo para mostrar el formulario-profesor
    function registrarP(){
        return view('interfaces/profesores/registro_profesor');
    }

    // Metodo para recibir los datos del formulario-profesor y validarlos para hacer la insercion en la tabla profesores y redirigirte al metodo inicio
    function guardarP(Request $request){
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|alpha:ascii',
            'apellidos' => 'required|alpha:ascii',
            'correo' => 'required|email|unique:profesores,correo',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|integer',
            'tipo_documento' => 'required|string',
            'num_documento' => 'required|integer|unique:profesores,num_documento',
        ],[
            'nombres.required' => 'Se requiere un nombre en este campo',
            'nombres.alpha' => 'Escriba solo carácteres',
            'apellidos.required' => 'Se requiere un apellido en este campo',
            'apellidos.alpha' => 'Escriba solo carácteres',
            'correo.required' => 'Se requiere un correo en este campo',
            'correo.email' => 'Escriba un correo valido',
            'correo.unique' => 'Ya exsite ese correo, introduzca uno nuevo',
            'fecha_nacimiento.required' => 'Se requiere una fecha en este campo',
            'fecha_nacimiento.date' => 'Solo se acepta fechas en este campo',
            'telefono.required' => 'Se requiere un telefono en este campo',
            'telefono.integer' => 'Escriba solo números en este campo',
            'tipo_documento.required' => 'Seleccione un tipo de documento',
            'numero_documento.required' => 'Se requiere un número de documento en este campo',
            'numero_documento.integer' => 'Escriba solo números en este campo',
            'numero_documento.unique' => 'Ya existe ese número de documento, introduzca uno nuevo',
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->only(['nombres','apellidos','correo','fecha_nacimiento','telefono','tipo_documento','num_documento']);
        profesores::create($data);
        return redirect('profesor_interfaz');
    }

    // Metodo para mostrar la papeleria, son los registros donde el estado es 0
    function papelera(){
        $profesores = profesores::where('estado',0)->get();
        return view('interfaces/profesores/profesor_papeleria', compact('profesores'));
    }

    // Metodo para actualizar el estado de un registro de 0 a 1 y dirigirte a la interfaz-profesor
    function recuperar($id_profesor){
        $profesores = profesores::find($id_profesor);
        $profesores->estado= 1;
        $profesores->save();
        return redirect('profesor_interfaz');
    }

    // Metodo para actualizar el estado de un registro de 1 a 0
    function eliminar($id_profesor){
        $profesores = profesores::find($id_profesor);
        $profesores->estado=0;
        $profesores->save();
        return redirect('profesor_interfaz');
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
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

    // metodo para validar los datos que llegan del formulario form-estudiante sean correctos y registrarlos en la tabla estudiantes y redirigir a la vista interfaz estudiante
    function guardarE(Request $request){
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|alpha:ascii',
            'apellidos' => 'required|alpha:ascii',
            'correo' => 'required|email|unique:estudiantes,correo',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|integer|unique:estudiantes,numero_documento',
        ],[
            'nombres.required' => 'Se requiere un nombre en este campo',
            'nombres.alpha' => 'Escriba solo carácteres',
            'apellidos.required' => 'Se requiere un apellido en este campo',
            'apellidos.alpha' => 'Escriba solo carácteres',
            'correo.required' => 'Se requiere un correo en este campo',
            'correo.email' => 'Escriba un correo valido',
            'correo.unique' => 'Ya existe ese correo, introduzca uno nuevo',
            'direccion.required' => 'Se requiere una dirección en este campo',
            'direccion.string' => 'Escriba una dirección valida',
            'fecha_nacimiento.required' => 'Se requiere una fecha en este campo',
            'fecha_nacimiento.date' => 'Solo se acepta fechas en este campo',
            'tipo_documento.required' => 'Seleccione un tipo de documento',
            'numero_documento.required' => 'Se requiere un numero de documento en este campo',
            'numero_documento.integer' => 'Escriba solo números',
            'numero_documento.unique' => 'Ya existe ese numero de documento, introduzca uno nuevo',
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->only(['nombres','apellidos','correo','direccion','fecha_nacimiento','tipo_documento','numero_documento']);
        estudiantes::create($data);
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
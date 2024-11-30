<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\acudientes;
use App\Models\estudiantes;

class acudienteController extends Controller
{
    // Metodo para mostrar el interfaz-acudiente y sus registros con el estado en 1
    function inicio () {
        $acudientes = acudientes::with('estudiante')->where('estado',1)->get();
        return view('interfaces/acudientes/acudiente', ['registros'=>$acudientes]);
    }

    // Metodo para mostrar formulario-acudiente y enviar un selec de la tabla estudiantes a la interfaz registro-acudiente
    function registrarA(){
        $estudiantes = estudiantes::all();
        return view('interfaces/acudientes/registro_acudiente',compact('estudiantes'));
    }

    //  Metodo para recibir los datos del formulario-acudiente y validarlos para hacer la insercion en la tabla acudientes y redirigirte al metodo inicio
    function guardarA(Request $request){
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|alpha:ascii',
            'apellidos' => 'required|alpha:ascii',
            'correo' => 'required|email|unique:acudientes,correo',
            'direccion' => 'required|string',
            'telefono' => 'required|integer|unique:acudientes,telefono',
            'fecha_nacimiento' => 'required|date',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|integer|unique:acudientes,numero_documento',
            'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
        ],[
            'nombres.required' => 'Se requiere un nombre en este campo',
            'nombres.alpha' => 'Escriba solo carácteres',
            'apellidos.required' => 'Se requiere un apellido en este campo',
            'apellidos.alpha' => 'Escriba solo carácteres',
            'correo.required' => 'Se requiere un correo en este campo',
            'correo.email' => 'Escriba un correo valido',
            'correo.unique' => 'Ya exsite ese correo, introduzca uno nuevo',
            'direccion.required' => 'Se requiere una dirección en este campo',
            'direccion.string' => 'Escriba una dirección valida',
            'telefono.required' => 'Se requiere un telefono en este campo',
            'telefono.integer' => 'Escriba solo números en este campo',
            'telefono.unique' => 'Ya existe ese telefono, introduzca uno nuevo',
            'fecha_nacimiento.required' => 'Se requiere una fecha en este campo',
            'fecha_nacimiento.date' => 'Solo se acepta fechas en este campo',
            'tipo_documento.required' => 'Seleccione un tipo de documento',
            'numero_documento.required' => 'Se requiere un número de documento en este campo',
            'numero_documento.integer' => 'Escriba solo números en este campo',
            'numero_documento.unique' => 'Ya existe ese número de documento, introduzca uno nuevo',
            'estudiante_id.required' => 'Seleccione un estudiante'
        ]);

        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $request->only(['nombres','apellidos','correo','direccion','telefono','fecha_nacimiento','tipo_documento','numero_documento','estudiante_id']);
        acudientes::create($data);
        return redirect('acudiente_interfaz');
    }

    // Metodo para mostrar el formulario de editar
    function formeditarA($id_acudiente){
        $acudiente = acudientes::findOrFail($id_acudiente);
        $estudiantes = estudiantes::all();
        return view('interfaces/acudientes/editar_acudiente', compact('acudiente', 'estudiantes'));
    }

    // Metodo para recibir los datos del formulario editar y actualizar en la tabla
    function editarA(Request $request, $id_acudiente){
        $validator = Validator::make($request->all(),[
            'nombres' => 'required|alpha:ascii',
            'apellidos' => 'required|alpha:ascii',
            'correo' => 'required|email|unique:acudientes,correo,'. $id_acudiente .',id_acudiente',
            'direccion' => 'required|string',
            'telefono' => 'required|integer|unique:acudientes,telefono,'. $id_acudiente .',id_acudiente',
            'fecha_nacimiento' => 'required|date',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|integer|unique:acudientes,numero_documento,'. $id_acudiente .',id_acudiente',
            'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
        ],[
            'nombres.required' => 'Se requiere un nombre en este campo',
            'nombres.alpha' => 'Escriba solo carácteres',
            'apellidos.required' => 'Se requiere un apellido en este campo',
            'apellidos.alpha' => 'Escriba solo carácteres',
            'correo.required' => 'Se requiere un correo en este campo',
            'correo.email' => 'Escriba un correo valido',
            'correo.unique' => 'Ya exsite ese correo, introduzca uno nuevo',
            'direccion.required' => 'Se requiere una dirección en este campo',
            'direccion.string' => 'Escriba una dirección valida',
            'telefono.required' => 'Se requiere un telefono en este campo',
            'telefono.integer' => 'Escriba solo números en este campo',
            'telefono.unique' => 'Ya existe ese telefono, introduzca uno nuevo',
            'fecha_nacimiento.required' => 'Se requiere una fecha en este campo',
            'fecha_nacimiento.date' => 'Solo se acepta fechas en este campo',
            'tipo_documento.required' => 'Seleccione un tipo de documento',
            'numero_documento.required' => 'Se requiere un número de documento en este campo',
            'numero_documento.integer' => 'Escriba solo números en este campo',
            'numero_documento.unique' => 'Ya existe ese número de documento, introduzca uno nuevo',
            'estudiante_id.required' => 'Seleccione un estudiante'
        ]);

        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $acudiente = acudientes::findOrFail($id_acudiente);
        $acudiente->update($request->all());
        return redirect('acudiente_interfaz');
    }

    // Metodo para actualizar el estado de un registro de 1 a 0
    function eliminar($id_acudiente){
        $acudiente = acudientes::find($id_acudiente);
        $acudiente->estado = 0;
        $acudiente->save();
        return redirect('acudiente_interfaz');
    }

    // Metodo para mostrar la papeleria, son los registros donde el estado es 0
    function papeleria(){
        $acudiente = acudientes::where('estado', 0)->get();
        return view('interfaces/acudientes/papelera_acudiente',['registros'=>$acudiente]);
    }

    // Metodo para actualizar el estado de un registro de 0 a 1 y dirigirte a la interfaz-profesor
    function recuperar($id_acudiente){
        $acudiente = acudientes::find($id_acudiente);
        $acudiente->estado = 1;
        $acudiente->save();
        return redirect('acudiente_interfaz');
    }
}

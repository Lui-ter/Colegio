<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\notas;
use App\Models\materias;
use App\Models\estudiantes;
use Illuminate\Http\Request;

class notasController extends Controller
{
    // metodo para mostrar el interfaz y sus registros en donde el estado es igual a 1
    function inicio () {
        $nota = notas::with('materia', 'estudiante')->where('estado', 1)->get();
        return view ('interfaces/notas/nota', compact('nota'));
    }

    // Metodo para mostrar formulario de registro
    function registrarN(){
        $materias = materias::all();
        $estudiantes = estudiantes::all();
        return view('interfaces/notas/registro_nota', compact('materias','estudiantes'));
    }

    // Metodo para recibir y guardar los datos enviados desde el formulario
    function guardarN(Request $request){
        $validator = Validator::make($request->all(),[
        'nota1' => 'required|numeric|min:0|max:5',
        'nota2' => 'required|numeric|min:0|max:5',
        'nota3' => 'required|numeric|min:0|max:5',
        'materia_id' => 'required|exists:materias,id_materia',
        'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
        ], [
        'nota1.required' => 'La nota1 es obligatoria.',
        'nota1.numeric' => 'La nota1 debe ser un número.',
        'nota1.max' => 'La nota1 no puede ser mayor a 5.0.',
        'nota1.min' => 'La nota1 no puede ser menor a 0.',

        'nota2.required' => 'La nota2 es obligatoria.',
        'nota2.numeric' => 'La nota2 debe ser un número.',
        'nota2.max' => 'La nota2 no puede ser mayor a 5.0.',
        'nota2.min' => 'La nota2 no puede ser menor a 0.',

        'nota3.required' => 'La nota3 es obligatoria.',
        'nota3.numeric' => 'La nota3 debe ser un número.',
        'nota3.max' => 'La nota3 no puede ser mayor a 5.0.',
        'nota3.min' => 'La nota3 no puede ser menor a 0.',
    ]);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $request->only(['nota1','nota2','nota3','materia_id','estudiante_id']);
        notas::create($data);

        return redirect('nota_interfaz');
    }

    // Metodo para cambiar el estado de un registro en especifico a 0
    function eliminar($id_nota){
        $nota = notas::find($id_nota);
        $nota->estado=0;
        $nota->save();
        return redirect('nota_interfaz');
    }

    // Metodo para mostrar un formulario de actualizacion de registros
    function formeditarN($id_nota){
        $nota = notas::findOrFail($id_nota);
        $estudiantes = estudiantes::all();
        $materias = materias::all();
        return view ('interfaces/notas/editar_nota', compact('nota','estudiantes','materias'));
    }

    // Metodo para actualizar registros del formulario
    function editarN(Request $request, $id_nota){
        $validator = Validator::make($request->all(),[
        'nota1' => 'required|numeric|min:0|max:5',
        'nota2' => 'required|numeric|min:0|max:5',
        'nota3' => 'required|numeric|min:0|max:5',
        'materia_id' => 'required|exists:materias,id_materia',
        'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
        ], [
        'nota1.required' => 'La nota1 es obligatoria.',
        'nota1.numeric' => 'La nota1 debe ser un número.',
        'nota1.max' => 'La nota1 no puede ser mayor a 5.0.',
        'nota1.min' => 'La nota1 no puede ser menor a 0.',

        'nota2.required' => 'La nota2 es obligatoria.',
        'nota2.numeric' => 'La nota2 debe ser un número.',
        'nota2.max' => 'La nota2 no puede ser mayor a 5.0.',
        'nota2.min' => 'La nota2 no puede ser menor a 0.',

        'nota3.required' => 'La nota3 es obligatoria.',
        'nota3.numeric' => 'La nota3 debe ser un número.',
        'nota3.max' => 'La nota3 no puede ser mayor a 5.0.',
        'nota3.min' => 'La nota3 no puede ser menor a 0.',
    ]);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $nota = notas::findOrFail($id_nota);
        $nota->update($request->all());
        return redirect('nota_interfaz');
    }

    // Metodo para mostrar los registros con un estado igual a 0
    function papeleria(){
        $nota = notas::where('estado', 0)->get();
        return view('interfaces/notas/papeleria_notas',['nota'=> $nota]);
    }

    // Metodo para cambiar el estado de un registro especifico a 1
    function recuperar($id_nota){
        $nota = notas::find($id_nota);
        $nota->estado = 1;
        $nota->save();
        return redirect('nota_interfaz');
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\notas;
use Illuminate\Http\Request;

class notasController extends Controller
{
    // metodo para mostrar el interfaz y sus registros
    function inicio () {
        $nota = notas::where('estado', 1)->get();
        return view ('interfaces/notas/nota', compact('nota'));
    }

    //Metodo para mostrar formulario
    function registrarN(){
        return view('interfaces/notas/registro_nota');
    }
    //Metodo para recibir y guardar los datos del formulario}
    
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
    //Metodo para eliminar un campo

    function eliminar($id_nota){
        $nota = notas::find($id_nota);
        $nota->estado=0;
        $nota->save();
        return redirect('nota_interfaz');
    }


    //Metodo para mostrar la papeleria
    function papeleria(){
        $nota = notas::where('estado', 0)->get();
        return view('interfaces/notas/papeleria_notas',['nota'=> $nota]);
    }

    //Metodo para recuperar campos
    function recuperar($id_nota){
        $nota = notas::find($id_nota);
        $nota->estado = 1;
        $nota->save();
        return redirect('nota_interfaz');
    }

}

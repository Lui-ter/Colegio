<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\cursos;
use App\Models\estudiantes;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class cursoController extends Controller
{
    //Metodo para mostrar interfaz y sus registros
    function inicio () {
        $cursos = cursos::with('profesor')->withcount('estudiante')->where('estado', 1)->get();
        return view ('interfaces/cursos/curso', compact('cursos'));
    }

    //Metodo para mostrar formulario
    function registrarC(){
        $estudiantes = estudiantes::all();
        $profesores = profesores::all();
        return view('interfaces/cursos/registro_curso',compact('estudiantes','profesores'));
    }

    //Metodo para recibir y guardar los datos del formulario
    function guardarC(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|alpha:ascii|unique:cursos,nombre',
            'profesor_id' => 'required|exists:profesores,id_profesor',
            'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
        ], [
            'nombre.required' => 'Se requiere un nombre al campo',
            'nombre.alpha' => 'Solo se acepta caracteres',
            'nombre.unique' => 'El curso ya existe',
            'profesor_id.required' => 'Se requiere agregar profesor',
            'profesor_id.exists' => 'El profesor ingresado no existe',
            'estudiante_id.required' => 'Se requiere agregar estudiante',
            'estudiante_id.exists' => 'El estudiante ingresado no existe',

        ]);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $request->only(['nombre','profesor_id','estudiante_id']);
        cursos::create($data);
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
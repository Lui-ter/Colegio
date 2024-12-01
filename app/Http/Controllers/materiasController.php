<?php

namespace App\Http\Controllers;

use App\Models\materias;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class materiasController extends Controller
{
    // Metodo para mostrar la interfaz de materias donde el estado de los registros es igual a 1
    function inicio () {
        $materia = materias::with('profesor')->where('estado', 1)->get();
        return view ('interfaces/materia', ['registros'=> $materia]);
    }

    // Metodo para mostrar el formulario para ingresar un nuevo registro
    function nuevo (){
        $profesores = profesores::all();
        return view('materias.nuevo',compact('profesores'));
    }

    // Metodo para recibir los datos del formulario, validarlos y guardarlos en la tabla materias
    function guardar(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|alpha:ascii',
            'profesor_id' => 'required|exists:profesores,id_profesor',
        ],[
            'nombre' => 'Es requerido un nombre en este campo',
            'nombre' => 'Solo se escribe letras en este campo',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $data=$request->only(['nombre','profesor_id']);
        materias::create($data);
        return redirect('materia');
    }

    // Metodo para mostrar el formulario de actualizacion de un registro en especifico
    function formeditarM($id_materia){
        $materia = materias::findOrFail($id_materia);
        $profesores = profesores::all();
        return view('materias/editar_materia', compact('materia', 'profesores'));
    }

    // Metodo para recibir los datos del formulario de edicion y actualizarlos en la tabla materias
    function editarM(Request $request, $id_materia){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|alpha:ascii',
            'profesor_id' => 'required|exists:profesores,id_profesor',
        ],[
            'nombre' => 'Es requerido un nombre en este campo',
            'nombre' => 'Solo se escribe letras en este campo',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $materia = materias::findOrFail($id_materia);
        $materia->update($request->all());
        return redirect('materia');
    }

    // Metodo para cambiar el estado de un registro en especifico a 0
    function eliminar ($id_materia){
        $materia= materias::find($id_materia);
        $materia->estado= 0;
        $materia->save();
        return redirect('materia');
    }

    // Metodo para mostrar la interfaz de materias donde el estado de los registros es igual a 0
    function papelera () {
        $materia = materias::where('estado', 0)->get();
        return view ('interfaces/materiaP', ['registros'=> $materia]);
    }

    // Metodo para cambiar el estado de un registro en especifico a 1
    function recuperar ($id_materia){
        $materia= materias::find($id_materia);
        $materia->estado= 1;
        $materia->save();
        return redirect('materia');
    }
}
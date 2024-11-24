<?php

namespace App\Http\Controllers;

use App\Models\materias;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class materiasController extends Controller
{
    function inicio () {
        $materia = materias::with('profesor')->where('estado', 1)->get();
        return view ('interfaces/materia', ['registros'=> $materia]);
    }
    function nuevo (){
        $profesores = profesores::all();

        return view('materia.nuevo',compact('profesores'));
    }
    function guardar(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'profesor_id' => 'required|exists:profesores,id_profesor',
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
    function eliminar ($id_materia){
        $materia= materias::find($id_materia);
        $materia->estado= 0;
        $materia->save();
        return redirect('materia');
    }
    function papelera () {
        $materia = materias::where('estado', 0)->get();
        return view ('interfaces/materiaP', ['registros'=> $materia]);
    }
    function recuperar ($id_materia){
        $materia= materias::find($id_materia);
        $materia->estado= 1;
        $materia->save();
        return redirect('materia');
    }
}

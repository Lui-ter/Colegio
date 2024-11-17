<?php

namespace App\Http\Controllers;

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
    //Metodo para recibir y guardar los datos del formulario
    function guardarN(Request $request){
        $nota = new notas();
        $nota->nota1 = $request->input('nota_uno');
        $nota->nota2 = $request->input('nota_dos');
        $nota->nota3 = $request->input('nota_tres');
        $nota->materia_id = $request->input('materia_id');
        $nota->estudiante_id = $request->input('estudiante_id');
        $nota->save();
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

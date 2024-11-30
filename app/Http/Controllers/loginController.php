<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\administrador;
use Illuminate\Http\Request;

class loginController extends Controller
{
     function login(){
        return view('interfaces.login.login');
     }

     function validar(Request $request){
      $validator = Validator::make($request->all(),[
      'usuario' => 'required|string',
      'contraseña' => 'required|string',
      ],[
      'usuario.required' => 'Se requiere un usuario en este campo',
      'contraseña.required' => 'Se requiere un contraseña en este campo',
      ]);
      if($validator->fails()){
         return back()
         ->withErrors($validator)
         ->withInput();
      }


        $usuario = $request->input('usuario');
        $contraseña = $request->input('contraseña');

        $admin = administrador::where('Usuario', $usuario)->where('Contraseña',$contraseña)->first();

        if($admin){
         return view('home',compact('admin'));
        }else{
         return redirect()->back()->withErrors(['mensaje' => 'Usuario o contraseña incorrectos.']);
      }

     }
}
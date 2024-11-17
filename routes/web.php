<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formulariosController;
use App\Http\Controllers\estudianteController;
use App\Http\Controllers\profesorController;
use App\Http\Controllers\acudienteController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\materiasController;
use App\Http\Controllers\notasController;
use App\Models\estudiantes;

Route::get('/', function () {
    return view('home');
});


// -------------------------------Estudiantes------------------------------------

// ruta que dirige a la vista del formulario registro-estudiante
Route::get('/estudiante_formulario',[estudianteController::class,'registrarE']);

// ruta post para recibir los datos del formulario registro-estudiante 
route::post('/estudiante_registro',[estudianteController::class, 'guardarE']);

// ruta que dirige a la vista del interfaz-estudiante
route::get('/estudiante_interfaz',[estudianteController::class,'inicio']);

// ruta para la papelera
route::get('estudiante_papelera',[estudianteController::class,'papelera']);

// ruta para recuperar un registro
route::get('estudiante_recuperar/{id_estudiante}',[estudianteController::class,'recuperar']);

// ruta para eliminar un campo
route::get('estudiante_eliminar/{id_estudiante}',[estudianteController::class,'eliminar']);
// -------------------------------Estudiantes------------------------------------

// -------------------------------Profesores-------------------------------------

// ruta que dirige a la vista del formulario registro-profesor
route::get('/profesor_formulario',[profesorController::class, 'registrarP']);

// ruta post para recibir los datos del formulario registro-profesor
route::post('/profesor_registro',[profesorController::class, 'guardarP']);

// ruta que dirige a la vista del interfaz-profesor
route::get('/profesor_interfaz',[profesorController::class,'inicio']);

//ruta que accede interfaz de la papelera
route::get('/profesor_papelera',[profesorController::class,'papelera']);

//ruta para recuperar un campo a papeleria
route::get('/profesor_recuperar/{id_profesor}',[profesorController::class,'recuperar']);

//ruta para eliminar un campo
route::get('/profesor_eliminar/{id_profesor}',[profesorController::class,'eliminar']);
// -------------------------------Profesores-------------------------------------

// -------------------------------Acudientes-------------------------------------

// ruta que dirige a la vista del formulario registro-acudiente
route::get('/acudiente_formulario',[acudienteController::class, 'registrarA']);

// ruta post para recibir los datos del formulario registro-acudiente
route::post('/acudiente_registro',[acudienteController::class, 'guardarA']);

// ruta que dirige a la vista del interfaz-acudiente
route::get('/acudiente_interfaz',[acudienteController::class,'inicio']);

// route for the stationery, access the view
route::get('/papeleria_acudiente',[acudienteController::class,'papeleria']);
// -------------------------------Acudientes-------------------------------------

// --------------------------------Materias--------------------------------------

// ruta vista materia
route::get('/materia',[materiasController::class,'inicio']);
route::get('/materia/nuevo',[materiasController::class,'nuevo']);
route::get('/materia/papelera',[materiasController::class,'papelera']);
route::post('/materia',[materiasController::class,'guardar']);
route::get('materia/eliminar/{id_materia}',[materiasController::class,'eliminar']);
route::get('materia/recuperar/{id_materia}',[materiasController::class,'recuperar']);

// --------------------------------Materias--------------------------------------

// ---------------------------------Cursos---------------------------------------

// ruta que dirige a la vista del formulario registro-curso
route::get('/curso_formulario',[cursoController::class, 'registrarC']);

// ruta post para recibir los datos del formulario registro-curso
route::post('/curso_registro',[cursoController::class, 'guardarC']);

// ruta que dirige a la vista del interfaz-curso
route::get('/curso_interfaz',[cursoController::class,'inicio']);

//ruta par la papeleria
route::get('curso_papeleria',[cursoController::class,'papeleria']);

// ---------------------------------Cursos---------------------------------------

// ---------------------------------Notas----------------------------------------

// ruta que dirige a la vista del formulario registro-nota
route::get('/nota_formulario',[notasController::class, 'registrarN']);

// ruta post para recibir los datos del formulario registro-nota
route::post('/nota_registro',[notasController::class, 'guardarN']);

// ruta que dirige a la vista del interfaz-nota
route::get('/nota_interfaz',[notasController::class,'inicio']);

// ruta que dirige a la vista de la papeleria
route::get('/nota_papeleria',[notasController::class,'papeleria']);

//ruta para recuperar un campo
route::get('/nota_recuperar/{id_nota}',[notasController::class,'recuperar']);

//ruta para eliminar un campo
route::get('/nota_eliminar/{id_nota}',[notasController::class,'eliminar']);
//---------------------------------Notas----------------------------------------

route::get('/registro_seis',[formulariosController::class, 'registrarM']);
route::post('/datos_materia',[formulariosController::class, 'guardarM']);

route::get('/registrar',[formulariosController::class,'mostrarR']);
route::post('/datos_registro',[formulariosController::class,'registrar']);
// vista para el login en general
route::get('/login',[formulariosController::class,'login']);
































 /*$estudiantes= new estudiantes;
    $estudiantes->nombres = 'Karlitos'; 
    $estudiantes->apellidos = 'Karlitos';
    $estudiantes->correo = 'karlistos23@gmail.com';
    $estudiantes->direccion = 'calle13';
    $estudiantes->fecha_nacimimento = '2024/03/12';
    $estudiantes->tipo_documento = 'cc';
    $estudiantes->numero_documento = '3141232';

    $estudiantes->save();
    return $estudiantes;*/

    //$estudiantes = estudiantes::find(3);
   //return $estudiantes;
    //buscar y actualizar
    /*$estudiantes = estudiantes::where('direccion','calle13')->first();
    

    $estudiantes->nombres = 'Juanprime';
    $estudiantes->save();

    return $estudiantes;*/

    /*$estudiantes = estudiantes::all();
    return $estudiantes;*/

    /*$estudiantes = estudiantes::where('id_estudiante', '>=', '2')->select('id_estudiante','nombres','apellidos')->get();
    return $estudiantes;*/
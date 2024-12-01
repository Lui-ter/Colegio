<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\estudianteController;
use App\Http\Controllers\profesorController;
use App\Http\Controllers\acudienteController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\materiasController;
use App\Http\Controllers\notasController;
use App\Models\estudiantes;

Route::get('/home', function () {
    return view('home');
})->middleware('admin');


// -------------------------------Estudiantes------------------------------------

// ruta que dirige a la vista del formulario registro-estudiante
Route::get('/estudiante_formulario',[estudianteController::class,'registrarE'])->middleware('admin');

// ruta post para recibir los datos del formulario registro-estudiante
route::post('/estudiante_registro',[estudianteController::class, 'guardarE'])->middleware('admin');

// ruta que dirige a la vista del interfaz-estudiante
route::get('/estudiante_interfaz',[estudianteController::class,'inicio'])->middleware('admin');

// ruta para la papelera
route::get('estudiante_papelera',[estudianteController::class,'papelera'])->middleware('admin');

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/estudiante_formulario_editar/{id_estudiante}',[estudianteController::class,'formeditarE'])->middleware('admin');

// ruta para editar los campos
route::post('/estudiante_editar/{id_estudiante}',[estudianteController::class,'editarE'])->middleware('admin');

// ruta para recuperar un registro
route::get('estudiante_recuperar/{id_estudiante}',[estudianteController::class,'recuperar'])->middleware('admin');

// ruta para eliminar un campo
route::get('estudiante_eliminar/{id_estudiante}',[estudianteController::class,'eliminar'])->middleware('admin');
// -------------------------------Estudiantes------------------------------------

// -------------------------------Profesores-------------------------------------

// ruta que dirige a la vista del formulario registro-profesor
route::get('/profesor_formulario',[profesorController::class, 'registrarP'])->middleware('admin');

// ruta post para recibir los datos del formulario registro-profesor
route::post('/profesor_registro',[profesorController::class, 'guardarP'])->middleware('admin');

// ruta que dirige a la vista del interfaz-profesor
route::get('/profesor_interfaz',[profesorController::class,'inicio'])->middleware('admin');

//ruta que accede interfaz de la papelera
route::get('/profesor_papelera',[profesorController::class,'papelera'])->middleware('admin');

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/profesor_formulario_editar/{id_profesor}',[profesorController::class,'formeditarP'])->middleware('admin');

// ruta para editar los campos
route::post('/profesor_editar/{id_profesor}',[profesorController::class,'editarP'])->middleware('admin');

//ruta para recuperar un campo a papeleria
route::get('/profesor_recuperar/{id_profesor}',[profesorController::class,'recuperar'])->middleware('admin');

//ruta para eliminar un campo
route::get('/profesor_eliminar/{id_profesor}',[profesorController::class,'eliminar'])->middleware('admin');
// -------------------------------Profesores-------------------------------------

// -------------------------------Acudientes-------------------------------------

// ruta que dirige a la vista del formulario registro-acudiente
route::get('/acudiente_formulario',[acudienteController::class, 'registrarA'])->middleware('admin');

// ruta post para recibir los datos del formulario registro-acudiente
route::post('/acudiente_registro',[acudienteController::class, 'guardarA'])->middleware('admin');

// ruta que dirige a la vista del interfaz-acudiente
route::get('/acudiente_interfaz',[acudienteController::class,'inicio'])->middleware('admin');

// route for the stationery, access the view
route::get('/papeleria_acudiente',[acudienteController::class,'papeleria'])->middleware('admin');

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/acudiente_formulario_editar/{id_acudiente}',[acudienteController::class,'formeditarA'])->middleware('admin');

// ruta para editar los campos
route::post('/acudiente_editar/{id_acudiente}',[acudienteController::class,'editarA'])->middleware('admin');

//ruta para eliminar un campo
route::get('/acudiente_eliminar/{id_acudiente}',[acudienteController::class,'eliminar'])->middleware('admin');

//ruta para recuperar
route::get('/acudiente_recuperar/{id_acudiente}',[acudienteController::class,'recuperar'])->middleware('admin');

// -------------------------------Acudientes-------------------------------------

// --------------------------------Materias--------------------------------------

// ruta vista materia
route::get('/materia',[materiasController::class,'inicio'])->middleware('admin');
route::get('/materia/nuevo',[materiasController::class,'nuevo'])->middleware('admin');
route::get('/materia/papelera',[materiasController::class,'papelera'])->middleware('admin');
route::post('/materia',[materiasController::class,'guardar'])->middleware('admin');
route::get('materia/eliminar/{id_materia}',[materiasController::class,'eliminar'])->middleware('admin');
route::get('materia/recuperar/{id_materia}',[materiasController::class,'recuperar'])->middleware('admin');

// --------------------------------Materias--------------------------------------

// ---------------------------------Cursos---------------------------------------

// ruta que dirige a la vista del formulario registro-curso
route::get('/curso_formulario',[cursoController::class, 'registrarC'])->middleware('admin');

// ruta post para recibir los datos del formulario registro-curso
route::post('/curso_registro',[cursoController::class, 'guardarC'])->middleware('admin');

// ruta que dirige a la vista del interfaz-curso
route::get('/curso_interfaz',[cursoController::class,'inicio'])->middleware('admin');

// ruta que muestra el formulario editar
route::get('/curso_formulario_editar/{id_curso}',[cursoController::class, 'formeditarC'])->middleware('admin');

// ruta para actualizar los datos del formulario editar-curso
route::post('/curso_editar/{id_curso}',[cursoController::class, 'editarC'])->middleware('admin');

//ruta par la papeleria
route::get('curso_papeleria',[cursoController::class,'papeleria'])->middleware('admin');

//ruta para recuperar un campo
route::get('/curso_recuperar/{id_curso}',[cursoController::class,'recuperar'])->middleware('admin');

//ruta para eliminar un campo
route::get('/curso_eliminar/{id_curso}',[cursoController::class,'eliminar'])->middleware('admin');

// ---------------------------------Cursos---------------------------------------

// ---------------------------------Notas----------------------------------------

// ruta que dirige a la vista del formulario registro-nota
route::get('/nota_formulario',[notasController::class, 'registrarN'])->middleware('admin');

// ruta post para recibir los datos del formulario registro-nota
route::post('/nota_registro',[notasController::class, 'guardarN'])->middleware('admin');

// ruta que dirige a la vista del interfaz-nota
route::get('/nota_interfaz',[notasController::class,'inicio'])->middleware('admin');

// ruta que dirige a la vista del formulario para editar un registro
route::get('nota_formulario_editar/{id_nota}',[notasController::class,'formeditarN'])->middleware('admin');

// ruta que lleva los datos del formulario para editarlos en el registro de la base de datos
route::post('editar_nota/{id_nota}',[notasController::class,'editarN'])->middleware('admin');

// ruta que dirige a la vista de la papeleria
route::get('/nota_papeleria',[notasController::class,'papeleria'])->middleware('admin');

//ruta para recuperar un campo
route::get('/nota_recuperar/{id_nota}',[notasController::class,'recuperar'])->middleware('admin');

//ruta para eliminar un campo
route::get('/nota_eliminar/{id_nota}',[notasController::class,'eliminar'])->middleware('admin');
//---------------------------------Notas----------------------------------------

//---------------------------------Login--------------------------------------------

route::get('/',[loginController::class,'login']);

route::post('/login_iniciar',[loginController::class,'validar']);

//---------------------------------Login--------------------------------------------
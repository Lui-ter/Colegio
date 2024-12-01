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


// -----------------------------------------------------Estudiantes--------------------------------------------------------------

// ruta que dirige a la vista del formulario registro-estudiante
Route::get('/estudiante_formulario',[estudianteController::class,'registrarE']);

// ruta post para recibir los datos del formulario registro-estudiante
route::post('/estudiante_registro',[estudianteController::class, 'guardarE']);

// ruta que dirige a la vista principal del interfaz-estudiante
route::get('/estudiante_interfaz',[estudianteController::class,'inicio']);

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/estudiante_formulario_editar/{id_estudiante}',[estudianteController::class,'formeditarE']);

// ruta para recibir los datos del formulario editar y actualizar el registro en especifico
route::post('/estudiante_editar/{id_estudiante}',[estudianteController::class,'editarE']);

// ruta para eliminar un campo de la interfaz principal
route::get('estudiante_eliminar/{id_estudiante}',[estudianteController::class,'eliminar']);

// ruta que muestra una vista de los registros en la papelera
route::get('estudiante_papelera',[estudianteController::class,'papelera']);

// ruta para recuperar un registro de la papelera
route::get('estudiante_recuperar/{id_estudiante}',[estudianteController::class,'recuperar']);

// -----------------------------------------------------Estudiantes--------------------------------------------------------------

// -----------------------------------------------------Profesores---------------------------------------------------------------

// ruta que dirige a la vista del formulario registro-profesor
route::get('/profesor_formulario',[profesorController::class, 'registrarP']);

// ruta post para recibir los datos del formulario registro-profesor
route::post('/profesor_registro',[profesorController::class, 'guardarP']);

// ruta que dirige a la vista principal del interfaz-profesor
route::get('/profesor_interfaz',[profesorController::class,'inicio']);

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/profesor_formulario_editar/{id_profesor}',[profesorController::class,'formeditarP']);

// ruta para recibir los datos del formulario editar y actualizar el registro especifico
route::post('/profesor_editar/{id_profesor}',[profesorController::class,'editarP']);

// ruta para eliminar un registro de la interfaz principal y mostrarlo en papelera
route::get('/profesor_eliminar/{id_profesor}',[profesorController::class,'eliminar']);

// ruta que accede a la interfaz de la papelera
route::get('/profesor_papelera',[profesorController::class,'papelera']);

// ruta para recuperar un campo de papeleria a la interfaz principal de profesores
route::get('/profesor_recuperar/{id_profesor}',[profesorController::class,'recuperar']);

// -----------------------------------------------------Profesores---------------------------------------------------------------

// -----------------------------------------------------Acudientes---------------------------------------------------------------

// ruta que dirige a la vista del formulario registro-acudiente
route::get('/acudiente_formulario',[acudienteController::class, 'registrarA']);

// ruta post para recibir los datos del formulario registro-acudiente
route::post('/acudiente_registro',[acudienteController::class, 'guardarA']);

// ruta que dirige a la vista del interfaz-acudiente
route::get('/acudiente_interfaz',[acudienteController::class,'inicio']);

// route for the stationery, access the view
route::get('/papeleria_acudiente',[acudienteController::class,'papeleria']);

// ruta para dirigirse a la vista en donde hay un formulario para editar datos en los campos
route::get('/acudiente_formulario_editar/{id_acudiente}',[acudienteController::class,'formeditarA']);

// ruta que recibe los datos del formulario editar y lo actualiza en la base de datos
route::post('/acudiente_editar/{id_acudiente}',[acudienteController::class,'editarA']);

// ruta para eliminar un campo de la interfaz principal
route::get('/acudiente_eliminar/{id_acudiente}',[acudienteController::class,'eliminar']);

// ruta para recuperar un registro de la papelera
route::get('/acudiente_recuperar/{id_acudiente}',[acudienteController::class,'recuperar']);

// -----------------------------------------------------Acudientes---------------------------------------------------------------

// ------------------------------------------------------Materias----------------------------------------------------------------

// ruta que muestra la interfaz principal de materias
route::get('/materia',[materiasController::class,'inicio']);

// ruta que muestra un formulario para registrar una nueva materia
route::get('/materia/nuevo',[materiasController::class,'nuevo']);

// ruta que recibe los registros del formulario para validar y guardarlo en la base de datos
route::post('/materia',[materiasController::class,'guardar']);

// ruta que muestra un formulario para editar un registro en especifico
route::get('/materia_formulario_editar/{id_materia}',[materiasController::class,'formeditarM']);

// ruta que recibe los datos del formulario editar y actualizarlo en la base de datos
route::post('/materia_editar/{id_materia}',[materiasController::class,'editarM']);

// ruta que elimina un registro de la interfaz principal
route::get('materia/eliminar/{id_materia}',[materiasController::class,'eliminar']);

// ruta que muestra los registros en papelera
route::get('/materia/papelera',[materiasController::class,'papelera']);

// ruta que recupera un registro de la papelera
route::get('materia/recuperar/{id_materia}',[materiasController::class,'recuperar']);

// ------------------------------------------------------Materias----------------------------------------------------------------

// -------------------------------------------------------Cursos-----------------------------------------------------------------

// ruta que dirige a la vista del formulario registro-curso
route::get('/curso_formulario',[cursoController::class, 'registrarC']);

// ruta post para recibir los datos del formulario registro-curso
route::post('/curso_registro',[cursoController::class, 'guardarC']);

// ruta que dirige a la vista del interfaz-curso
route::get('/curso_interfaz',[cursoController::class,'inicio']);

// ruta que muestra el formulario editar
route::get('/curso_formulario_editar/{id_curso}',[cursoController::class, 'formeditarC']);

// ruta para recibir los datos del formulario editar-curso
route::post('/curso_editar/{id_curso}',[cursoController::class, 'editarC']);

// ruta que muestra los registros en la papelera
route::get('curso_papeleria',[cursoController::class,'papeleria']);

// ruta para recuperar un registro de la papeleria
route::get('/curso_recuperar/{id_curso}',[cursoController::class,'recuperar']);

// ruta para eliminar un registro de la interfaz principal
route::get('/curso_eliminar/{id_curso}',[cursoController::class,'eliminar']);

// -------------------------------------------------------Cursos-----------------------------------------------------------------

// -------------------------------------------------------Notas------------------------------------------------------------------

// ruta que dirige a la vista del formulario registro-nota
route::get('/nota_formulario',[notasController::class, 'registrarN']);

// ruta post para recibir los datos del formulario registro-nota
route::post('/nota_registro',[notasController::class, 'guardarN']);

// ruta que dirige a la vista del interfaz-nota
route::get('/nota_interfaz',[notasController::class,'inicio']);

// ruta que dirige a la vista del formulario para editar un registro
route::get('nota_formulario_editar/{id_nota}',[notasController::class,'formeditarN']);

// ruta que lleva los datos del formulario para editarlos en la base de datos
route::post('editar_nota/{id_nota}',[notasController::class,'editarN']);

// ruta que dirige a la vista de la papeleria
route::get('/nota_papeleria',[notasController::class,'papeleria']);

// ruta para recuperar un campo de la papelera
route::get('/nota_recuperar/{id_nota}',[notasController::class,'recuperar']);

// ruta para eliminar un campo de la interfaz principal
route::get('/nota_eliminar/{id_nota}',[notasController::class,'eliminar']);

// -------------------------------------------------------Notas-----------------------------------------------------------------

// -------------------------------------------------------Login-----------------------------------------------------------------

// ruta que muestra el formulario del login
route::get('/',[loginController::class,'login']);

// ruta que valida los datos del formulario del login y valida
route::post('/login_iniciar',[loginController::class,'validar']);

// -------------------------------------------------------Login-----------------------------------------------------------------
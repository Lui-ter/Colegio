@extends('layouts.platilla_formulario')
@section('container')

<div class="form-box">
        <h2>Registrarse</h2>
        <h3>Materias</h3>
        <form action="/datos_materia" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label>ID Profesor</label>
                <input type="text" id="profesor_id" name="profesor_id" required> <br>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    
</div>
@endsection
@extends('layouts.platilla_formulario')
@section('container')

    <div class="form-box">
        <h2>Registrarse</h2>
        <h3>Curso</h3>
        <form action="/curso_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
                @error('nombre')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>ID Profesor</label>
                <input type="text" id="apellido" name="profesor_id" required>
                @error('profesor_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>ID Estudiante</label>
                <input type="text" id="correo" name="estudiante_id" required>
                @error('estudiante_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
@endsection
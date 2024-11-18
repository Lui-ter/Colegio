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
                <label>Profesor</label>
                <select name="profesor_id" id="profesor_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($profesores as $profesor)
                        <option {{ old('profesor_id') == $profesor->id_profesor ? 'selected' : ''}}value="{{ $profesor->id_profesor }}">{{ $profesor->nombres.' '.$profesor->apellidos }}</option>
                    @endforeach
                </select>
                @error('profesor_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($estudiantes as $estudiante)
                        <option {{ old('estudiante_id') == $estudiante->id_estudiante ? 'selected' : ''}}value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombres.' '.$estudiante->apellidos }}</option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
@endsection

@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Actualizar</h2>
        <h3>Curso</h3>
        <form action="{{ url('/curso_editar',['id_curso' => $curso->id_curso]) }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>
                @error('nombre')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Profesor</label>
                <select name="profesor_id" id="profesor_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->id_profesor }}"{{ $curso->profesor_id == $profesor->id_profesor ? 'selected' : ''}}>{{ $profesor->nombres.' '.$profesor->apellidos }}</option>
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
                        <option value="{{ $estudiante->id_estudiante }}"{{ $curso->estudiante_id == $estudiante->id_estudiante ? 'selected' : ''}}>{{ $estudiante->nombres.' '.$estudiante->apellidos }}</option>
                    @endforeach
                </select>
                @error('estudiante_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
@endsection

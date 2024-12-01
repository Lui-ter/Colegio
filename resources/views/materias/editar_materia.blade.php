@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Actualizar</h2>
        <h3>Materia</h3>
        <form action="{{ url('/materia_editar',['id_materia' => $materia->id_materia]) }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ $materia->nombre }}" required>
                @error('nombre')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Profesor</label>
                <select name="profesor_id" id="profesor_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor->id_profesor }}"{{ $materia->profesor_id == $profesor->id_profesor ? 'selected' : ''}}>{{ $profesor->nombres.' '.$profesor->apellidos }}</option>
                    @endforeach
                </select>
                @error('profesor_id')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
@endsection

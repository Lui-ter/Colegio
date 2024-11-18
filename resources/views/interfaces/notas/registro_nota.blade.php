@extends('layouts.platilla_formulario')
@section ('container')
<div class="form-box">
        <h2>Registrarse</h2>
        <h3>Notas</h3>
        <form action="/nota_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nota N°1</label>
                <input type="decimal" id="nota1" name="nota1" required>
                @error('nota1')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Nota N°2</label>
                <input type="decimal" id="nota2" name="nota2" required>
                @error('nota2')
                <div class="alerta">{{ $message }}</div>
            @enderror
            </div>
            <div class="input-group">
                <label>Nota N°3</label>
                <input type="decimal" id="nota3" name="nota3" required>
                @error('nota3')
                <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Materia</label>
                <select name="materia_id" id="materia_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($materias as $materia)
                        <option {{ old('materia_id') == $materia->id_materia ? 'selected' : ''}}value="{{ $materia->id_materia }}">{{ $materia->nombre}}</option>
                    @endforeach
                </select>
                @error('materia_id')
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

@extends('layouts.platilla_formulario')
@section ('container')
<div class="form-box">
        <h2>Actualizar</h2>
        <h3>Notas</h3>
        <form action="{{url('editar_nota',['id_nota' => $nota->id_nota])}}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nota N°1</label>
                <input type="decimal" id="nota1" name="nota1" value="{{ $nota->nota1 }}" required>
                @error('nota1')
                    <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Nota N°2</label>
                <input type="decimal" id="nota2" name="nota2" value="{{ $nota->nota2 }}" required>
                @error('nota2')
                <div class="alerta">{{ $message }}</div>
            @enderror
            </div>
            <div class="input-group">
                <label>Nota N°3</label>
                <input type="decimal" id="nota3" name="nota3" value="{{ $nota->nota3 }}" required>
                @error('nota3')
                <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Materia</label>
                <select name="materia_id" id="materia_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id_materia }}" {{ $nota->materia_id == $materia->id_materia ? 'selected' : ''}}>{{ $materia->nombre}}</option>
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
                        <option value="{{ $estudiante->id_estudiante }}" {{ $nota->estudiante_id == $estudiante->id_estudiante ? 'selected' : ''}}>{{ $estudiante->nombres.' '.$estudiante->apellidos }}</option>
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

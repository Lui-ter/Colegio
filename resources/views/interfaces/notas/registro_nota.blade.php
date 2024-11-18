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
                <label>ID Materia</label>
                <input type="text" id="apellido" name="materia_id" required>
                @error('materia_id')
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
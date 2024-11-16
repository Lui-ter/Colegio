@extends('layouts.platilla_formulario')
@section ('container')
<div class="form-box">
        <h2>Registrarse</h2>
        <h3>Notas</h3>
        <form action="/nota_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nota N°1</label>
                <input type="decimal" id="apellido" name="nota_uno" required>
            </div>
            <div class="input-group">
                <label>Nota N°2</label>
                <input type="decimal" id="apellido" name="nota_dos" required>
            </div>            
            <div class="input-group">
                <label>Nota N°3</label>
                <input type="decimal" id="apellido" name="nota_tres" required>
            </div>
            <div class="input-group">
                <label>ID Materia</label>
                <input type="text" id="apellido" name="materia_id" required>
            </div>
            <div class="input-group">
                <label>ID Estudiante</label>
                <input type="text" id="correo" name="estudiante_id" required>
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
@endsection
@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Registrarse</h2>
        <h3>Acudiente</h3>
        <form action="/acudiente_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" required>
            </div>
            <div class="input-group">
                <label>Dirección</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            <div class="input-group">
                <label>Telefono</label>
                <input type="number" id="telefono" name="telefono" required>
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="identificacion">
                    <option value="cc">Cedula</option>
                    <option value="ti">Tarjeta identidad</option>
                    <option value="ce">Cedula extrajeria</option>
                </select>
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="numero_documento" name="numero_documento" required>
            </div>
            <div class="input-group">
                <label >id del estudiante</label>
                <input type="number" id="estudiante_id" name="estudiante_id" required>
            </div>
         
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
@endsection
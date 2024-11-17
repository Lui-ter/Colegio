@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Registrarse</h2>
        <h3>Estudiante</h3>
        <form action="/estudiante_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombres</label>
                <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" autofocus required>
                @error('nombres')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                @error('apellidos')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" value="{{ old('correo') }}" required>
                @error('correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                @error('fecha_nacimiento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento">
                    <option value="C.C.">Cedula</option>
                    <option value="T.I.">Tarjeta identidad</option>
                    <option value="C.E.">Cedula extrajeria</option>
                </select>
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}" required>
                @error('numero_documento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
@endsection

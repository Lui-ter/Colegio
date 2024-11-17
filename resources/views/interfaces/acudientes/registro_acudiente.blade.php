@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Registrarse</h2>
        <h3>Acudiente</h3>
        <form action="/acudiente_registro" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" autofocus required>
                @error('nombres')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                @error('apellidos')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" value="{{ old('correo') }}" required>
                @error('correo')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                @error('direccion')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Telefono</label>
                <input type="number" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                @error('telefono')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                @error('fecha_nacimiento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento">
                    <option value="C.C.">Cedula</option>
                    <option value="T.I.">Tarjeta identidad</option>
                    <option value="C.E.">Cedula extrajeria</option>
                </select>
                @error('tipo_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}" required>
                @error('numero_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Nombre del estudiante</label>
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

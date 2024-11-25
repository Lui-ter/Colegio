@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Actualización</h2>
        <h3>Estudiantes</h3>
        <form action="{{ url('/estudiante_editar',['id_estudiante' => $estudiante->id_estudiante]) }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombres" name="nombres" value="{{ $estudiante->nombres }}" autofocus required>
                @error('nombres')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ $estudiante->apellidos }}" required>
                @error('apellidos')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" value="{{ $estudiante->correo }}" required>
                @error('correo')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ $estudiante->direccion }}" required>
                @error('direccion')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}" required>
                @error('fecha_nacimiento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="C.C." {{ $estudiante->tipo_documento == 'C.C.' ? 'selected' : '' }}>Cédula</option>
                    <option value="T.I." {{ $estudiante->tipo_documento == 'T.I.' ? 'selected' : '' }}>Tarjeta de identidad</option>
                    <option value="C.E." {{ $estudiante->tipo_documento == 'C.E.' ? 'selected' : '' }}>Cédula de extranjería</option>
                </select>
                @error('tipo_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="numero_documento" name="numero_documento" value="{{ $estudiante->numero_documento }}" required>
                @error('numero_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
@endsection

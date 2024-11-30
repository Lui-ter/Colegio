@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Actualización</h2>
        <h3>Profesor</h3>
        <form action="{{ url('/profesor_editar',['id_profesor' => $profesor->id_profesor]) }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombres" name="nombres" value="{{ $profesor->nombres }}" autofocus required>
                @error('nombres')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ $profesor->apellidos }}" required>
                @error('apellidos')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" value="{{ $profesor->correo }}" required>
                @error('correo')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $profesor->fecha_nacimiento }}" required>
                @error('fecha_nacimiento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Telefono</label>
                <input type="number" id="telefono" name="telefono" value="{{ $profesor->telefono }}" required>
                @error('telefono')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="C.C." {{ $profesor->tipo_documento == 'C.C.' ? 'selected' : '' }}>Cédula</option>
                    <option value="T.I." {{ $profesor->tipo_documento == 'T.I.' ? 'selected' : '' }}>Tarjeta de identidad</option>
                    <option value="C.E." {{ $profesor->tipo_documento == 'C.E.' ? 'selected' : '' }}>Cédula de extranjería</option>
                </select>
                @error('tipo_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="num_documento" name="num_documento" value="{{ $profesor->num_documento }}" required>
                @error('numero_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
@endsection

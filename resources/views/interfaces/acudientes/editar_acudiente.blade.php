@extends('layouts.platilla_formulario')
@section('container')
    <div class="form-box">
        <h2>Actualización</h2>
        <h3>Acudiente</h3>
        <form action="{{ url('/acudiente_editar',['id_acudiente' => $acudiente->id_acudiente]) }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombres" name="nombres" value="{{ $acudiente->nombres }}" autofocus required>
                @error('nombres')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ $acudiente->apellidos }}" required>
                @error('apellidos')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Correo</label>
                <input type="text" id="correo" name="correo" value="{{ $acudiente->correo }}" required>
                @error('correo')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ $acudiente->direccion }}" required>
                @error('direccion')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Telefono</label>
                <input type="number" id="telefono" name="telefono" value="{{ $acudiente->telefono }}" required>
                @error('telefono')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Fecha de nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $acudiente->fecha_nacimiento }}" required>
                @error('fecha_nacimiento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label>Tipo documento</label>
                <select name="tipo_documento" id="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="C.C." {{ $acudiente->tipo_documento == 'C.C.' ? 'selected' : '' }}>Cédula</option>
                    <option value="T.I." {{ $acudiente->tipo_documento == 'T.I.' ? 'selected' : '' }}>Tarjeta de identidad</option>
                    <option value="C.E." {{ $acudiente->tipo_documento == 'C.E.' ? 'selected' : '' }}>Cédula de extranjería</option>
                </select>
                @error('tipo_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Numero documento</label>
                <input type="number" id="numero_documento" name="numero_documento" value="{{ $acudiente->numero_documento }}" required>
                @error('numero_documento')
                        <div class="alerta">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label >Nombre del estudiante</label>
                <select name="estudiante_id" id="estudiante_id" required>
                    <option value="" selected>Seleccionar</option>
                    @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id_estudiante }}" {{ $acudiente->estudiante_id == $estudiante->id_estudiante ? 'selected' : '' }}> {{ $estudiante->nombres . ' ' . $estudiante->apellidos }} </option>
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

@extends('layouts.platilla_formulario')
@section('container')

<div class="form-box">
    <h2>Iniciar sessión</h2>
    <h3>Administración</h3>
    <form action="/login_iniciar" method="POST">
        @csrf
        <div class="input-group">
            <label>Usuario</label>
            <input type="text" id="Usuario" name="usuario" required value="{{ old('usuario') }}">
            @error('usuario')
                    <div class="alerta">{{ $message }}</div>
                @enderror
        </div>
        <div class="input-group">
            <label>Contraseña</label>
            <input type="text" id="contraseña" name="contraseña" required value="{{ old('contraseña') }}"> <br>
            @error('contraseña')
            <div class="alerta">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn">Ingresar</button>
    </form>

</div>




@endsection
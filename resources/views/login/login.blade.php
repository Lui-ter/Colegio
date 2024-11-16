@extends('layouts.platilla_formulario')
@section('container')

    <!-- Formulario de Inicio de Sesión -->
    <div class="form-box">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label>Tipo usuario</label>
                <select name="usuario" id="usuario">
                    <option value="1" >estudiantes</option>
                    <option value="2"selected>profesores</option>
                    <option value="3">Acudientes</option>
                    <option value="4">Administracion</option>
                </select>
            </div>
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="password">Documento</label>
                <input type="password" id="documento" name="documento" required>
            </div>
            <button type="submit" class="btn">Ingresar</button>
        </form>
        
    </div>
    
@endsection
    
   
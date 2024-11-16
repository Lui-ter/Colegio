@extends('layouts.plantilla')
@section('container')
<div class="container p-4">
<div class="card">
    
    <div class="card-title p-3">
        <h2>Registrarse</h2>
        <h3>Materias</h3>
    </div>
    <div class="card-body">
        <div>
        
            <form action="/materia" method="POST" class="col-6">
                @csrf
                <div>
                    <label>Nombre</label> <br>
                    <input type="text" id="nombre" name="nombre" required class="form-control mb-4" autofocus value="{{old('nombre')}}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label>Profesor</label> <br>
                    <select name="profesor_id" id="profesor_id" class="form-control mb-4" required>
                        <option value="">Seleccione</option>
                        @foreach($profesores as $profesor)
                        <option {{ old('profesor_id') == $profesor->id_profesor ? 'selected' : '' }} value="{{$profesor->id_profesor}}">{{$profesor->nombres.' '. $profesor->apellidos}}</option>
                        @endforeach
                    </select>
                    @error('profesor_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>
        
    </div>
    </div>
</div>
</div>

@endsection
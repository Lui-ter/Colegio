@extends('layouts.plantilla')
@push('estilos')
@section('container')
<div class="container p-4">
    <div class="Titulo">
        
    </div>
    <div class="card">
        <div class="card-title p-3">
            <H3>Papelera Materia</H3>
            <a href="{{url('materia')}}" class="btn btn-secondary float-end ms-3">volver</a>

        </div>
        
        <div class="card-body">
            <div class="Tabla">
                <table border="1" class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Profesor</th>
                        <th>Recuperar</th>
                    </tr>
                @foreach ( $registros as $registro )
                    <tr>
                        <td>{{$registro->id_materia}}</td>
                        <td>{{$registro->nombre}}</td>
                        <td></td>
                        
                        <td><a href="{{ url('materia/recuperar/'. $registro->id_materia)}}"  onclick="return confirm('¿Estas seguro de recuperar esta materia?')">Recuperar</a></td>
                    </tr>        
                @endforeach
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection
@extends('layouts.plantilla')
@push('estilos')
@section('container')
<div class="container p-4">
    <div class="Titulo">
        
    </div>
    <div class="card">
        <div class="card-title p-3">
            <H3>Materias</H3>
            <a href="{{url('materia/papelera')}}" class="btn btn-danger float-end ms-3">papelera</a>
            <a href="{{url('materia/nuevo')}}" class="btn btn-primary float-end">nuevo</a>

        </div>
        
        <div class="card-body">
            <div class="Tabla">
                <table border="1" class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Profesor</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                @foreach ( $registros as $registro )
                    <tr>
                        <td>{{$registro->id_materia}}</td>
                        <td>{{$registro->nombre}}</td>
                        <td></td>
                        <td><a href="">Editar</a></td>
                        <td><a href="{{ url('materia/eliminar/'. $registro->id_materia)}}"  onclick="return confirm('¿Estas seguro de borrar una materia?')">Borrar</a></td>
                    </tr>        
                @endforeach
                </table>
            </div>
        </div>
    </div>
    
</div>

@endsection
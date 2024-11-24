@extends('layouts.plantilla')
@push('estilos')
<style>
    .container1{
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
    }
    h3 {
        text-align: center;
    }

    .titulo {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    width: 100%;
    font-size: 30px;
    background-color: #f0f0f0;
    }
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    }

    .tabla {
    width: auto;
    margin: 20px auto;
    border-collapse: collapse;
    }

    .tabla table {
    width: auto;
    border: 1px solid #ccc;
    }

    .tabla th, .tabla td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ccc;
    }

    .tabla th {
    background-color: #009688; /* Color turquesa */
    color: white;
    font-weight: bold; /* Negrilla */
    }

    .tabla tr:nth-child(even) {
    background-color: #f2f2f2;
    }

    /* Específico para las últimas dos columnas */
    .tabla td:nth-last-child(2), .tabla td:last-child {
        background-color: #009688; /* Fondo turquesa */
        color: white; /* Texto blanco */
        text-align: center;
        font-weight: bold; /* Negrilla */
        cursor: pointer; /* Cambiar cursor a pointer */
    }

    /* Hover effect only for the last two columns */
    .tabla td:nth-last-child(2):hover, .tabla td:last-child:hover {
        background-color: #00796b; /* Color más oscuro */
    }

    .tabla td a {
        color: white; /* Color blanco para los enlaces dentro de los botones */
        text-decoration: none;
        display: block;
        padding: 5px 10px;
        text-align: center;
        border-radius: 4px;
    }

    .tabla td a:hover {
        background-color: #00796b;
        text-decoration: none;
    }

    .tabla td button {
        background-color: #009688; /* Color turquesa para botones */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin: 10px 0;
    }

    .tabla td button:hover {
        background-color: #00796b;
    }

    /* Posicionar botones al lado del campo de la tabla */
    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .button-container button {
        margin: 0 5px;
    }
</style>
@section('container')
<div class="container1">
    <div class="Titulo">
        <H3>Acudiente</H3>
    </div>
            <a href="{{url('acudiente_formulario')}}"><button>Nuevo Registro</button></a>
            <a href="{{url('papeleria_acudiente')}}"><button>Papeleria</button></a>
    <div class="Tabla">

        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Correo electronico</td>
                <td>Dirección</td>
                <td>Telefono</td>
                <td>Fecha de nacimiento</td>
                <td>Tipo de documento</td>
                <td>Numero de Documento</td>
                <td>Estudiante</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
        @foreach ( $registros as $registro )
            <tr>
                <td>{{$registro->id_acudiente}}</td>
                <td>{{$registro->nombres}}</td>
                <td>{{$registro->apellidos}}</td>
                <td>{{$registro->correo}}</td>
                <td>{{$registro->direccion}}</td>
                <td>{{$registro->telefono}}</td>
                <td>{{$registro->fecha_nacimiento}}</td>
                <td>{{$registro->tipo_documento}}</td>
                <td>{{$registro->numero_documento}}</td>
                <td>{{$registro->estudiante->nombres.' '.$registro->estudiante->apellidos}}</td>
                <td>Editar</td>
                <td><a href="{{ url('acudiente_eliminar/'.$registro->id_acudiente)}}"onclick="return confirm('¿Estás seguro de borrar este campo?')">Borrar</a></td>
            </tr>
        @endforeach
        </table>

    </div>
</div>

@endsection

@extends('layouts.plantilla')
@push('estilos')
<style>
    .container1{
        margin-left: auto;
        margin-right: auto;
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
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
    }

    .tabla table {
    width: 100%;
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
        <H3>Notas</H3>
    </div>
    <a href="{{url('nota_formulario')}}"><button>Nuevo Registro</button></a>
    <a href="{{('nota_papeleria')}}"><button>Papeleria</button></a>
    <div class="Tabla">
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Estudiante</td>
                <td>Nota N°1</td>
                <td>Nota N°2</td>
                <td>Nota N°3</td>
                <td>Materia</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
        @foreach ( $nota as $registro )
            <tr>
                <td>{{$registro->id_nota}}</td>
                <td>{{$registro->estudiante->nombres.' '.$registro->estudiante->apellidos}}</td>
                <td>{{$registro->nota1}}</td>
                <td>{{$registro->nota2}}</td>
                <td>{{$registro->nota3}}</td>
                <td>{{$registro->materia->nombre}}</td>
                <td><a href="{{url('nota_formulario_editar/'.$registro->id_nota)}}">Editar</a></td>
                <td><a href="{{url('nota_eliminar/' . $registro->id_nota)}}" onclick="return confirm('¿Estas seguro de borrar este campo?')">Borrar</a></td>
            </tr>
        @endforeach
        </table>

    </div>
</div>

@endsection

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
<div class="container">
    <div class="Titulo">
        <H3>Profesores</H3>
    </div>
            <a href="{{url('profesor_interfaz')}}"><button>Atras</button></a>
           
    <div class="Tabla">
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Correo</td>
                <td>Fecha de nacimiento</td>
                <td>Telefono</td>
                <td>Tipo de documento</td>
                <td>Numero de Documento</td>
                <td>Recuperar</td>
                
            </tr>
        @foreach ( $profesores as $profesor )
            <tr>
                <td>{{$profesor->id_profesor}}</td>
                <td>{{$profesor->nombres}}</td>
                <td>{{$profesor->apellidos}}</td>
                <td>{{$profesor->correo}}</td>
                <td>{{$profesor->fecha_nacimiento}}</td>
                <td>{{$profesor->telefono}}</td>
                <td>{{$profesor->tipo_documento}}</td>
                <td>{{$profesor->num_documento}}</td>
                <td><a href="{{ url('profesor_recuperar/'. $profesor->id_profesor)}}" onclick="return confirm('¿Estas seguro de recuperar el campo)')">Recupera</a></td>
                
            </tr>        
        @endforeach
        </table>

    </div>
</div>

@endsection
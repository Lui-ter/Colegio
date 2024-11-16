@extends('layouts.plantilla')

@push('estilos')
    <style>
        /* Estilos para el contenedor principal */
.main-content {
    padding: 20px; /* Espacio alrededor del contenido */
    background-color: #f4f4f4; /* Color de fondo claro */
    
}

/* Estilos para la tarjeta */
.card {
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
    padding: 20px; 
    max-width: 800px; 
    width: 100%; 
    margin: 20px auto;
}


.card h2 {
    color: #264653; 
    font-size: 24px; 
    font-weight: bold; 
    margin-bottom: 15px; 
}

/* Estilos para el párrafo */
.card p {
    color: #6c757d; /* Color del texto */
    font-size: 16px; /* Tamaño de fuente del párrafo */
    line-height: 1.5; /* Altura de línea */
}

    </style>  
@endpush

@section('container')
<section class="main-content">
    <!-- Bienvenida -->
    <div class="card">
        <h2>Bienvenido/a, Administrador</h2>
        <p>Esta es la página principal de administración. Aquí puedes gestionar estudiantes, profesores, clases y ver estadísticas generales.</p>
    </div>
</section>
@endsection
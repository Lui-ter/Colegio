<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @stack('estilos')
    
<style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        
      
        header {
            background-color: #2a9d8f;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            
            
        }

         .h1 {
            font-size: 3vh; /* Tamaño de letra típico de un h1 */
            font-weight: bold; /* Peso de fuente típico de h1 */
            margin: 0; /* Elimina márgenes por defecto */
            line-height: 1.2; /* Altura de línea común en títulos */
            color: inherit; /* Mantén el color del enlace o defínelo según lo necesites */
            text-decoration: none; /* Elimina subrayado si lo prefieres */
        }

        .header-buttons {
            display: flex;
            gap: 10px;
        }

        .header-buttons a {
            color: #fff;
            background-color: #264653;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .header-buttons a:hover {
            background-color: #1d3f40;
        }

        
        .container_l {
            display: flex;
        }

        
        .sidebar {
            width: 250px;
            background-color: #264653;
            padding: 15px;
            color: #fff;
            height: 100vh;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #2a9d8f;
        }

        
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

    .footer{
    background-color: #2a9d8f;
    color: #ffffff;
    text-align: center;
    padding: 15px 0;
    font-size: 14px;
    position: fixed;
    bottom: 0;
    width: 100%;
    }

</style>

</head>
<body>
    
    <!-- Header -->
    <header>
        <a href="/" class="h1">Houston Academy</a>
        <div class="header-buttons">
            <a href="/login">Iniciar Sesión</a>
            
        </div>
    </header>

    <!-- Contenedor Principal -->
    <div class="container_l">

        <!-- Menú Lateral -->
        <aside class="sidebar">
            <h2>Home</h2>
            <a href="/ ">Inicio</a>
            <a href="{{url('estudiante_interfaz')}}">Estudiantes</a>
            <a href="{{url('profesor_interfaz')}}">Profesores</a>
            <a href="{{url('acudiente_interfaz')}}">Acudientes</a>
            <a href="{{url('curso_interfaz')}}">Cursos</a>
            <a href="{{url('materia')}}">Materias</a>
            <a href="{{url('nota_interfaz')}}">Notas</a>
            
           
        </aside>
        @yield('container')
    </div>
    
    
    



    <footer class="footer">
        <p>&copy; 2024 Houston Academy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

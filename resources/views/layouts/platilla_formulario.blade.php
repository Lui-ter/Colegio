<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Administracion')</title>
<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }


    header {
        background-color: #2a9d8f;
        color: #fff;
        padding: 15px;
        text-align: center;
    }
        .h1{
            font-size: 2em; /* Tamaño de letra típico de un h1 */
            font-weight: bold; /* Peso de fuente típico de h1 */
            margin: 0; /* Elimina márgenes por defecto */
            line-height: 1.2; /* Altura de línea común en títulos */
            color: inherit; /* Mantén el color del enlace o defínelo según lo necesites */
            text-decoration: none; /* Elimina subrayado si lo prefieres */
        }

        header h1 {
            margin: 0;
        }
        .header-buttons {
            display: flex;
            gap: 10px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .container {
        flex-grow: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    .form-box {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 400px;
    }

        .form-box h2, h3 {
            color: #3C8E8F;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            color: #1D4B58;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
        width: 100%;
        padding: 10px;
        background-color: #3C8E8F;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        }

        .btn:hover {
        background-color: #2b6f72;
        }
        .input-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #ffffff;
        color: #1D4B58;
        font-size: 16px;
        cursor: pointer;
        }

        .input-group select:focus {
        border-color: #3C8E8F;
        outline: none;
        }

        .footer {
        background-color: #2a9d8f;
        color: #ffffff;
        text-align: center;
        padding: 15px 0;
        font-size: 14px;
        width: 100%;
        
    }
</style>
</head>
<body>

    <!-- Header -->
    <header>
       Houston Academy

    </header>

    <!-- Contenedor Principal -->
    <div class="container">

    @yield('container')
    </div>


    <footer class="footer">
        <p>&copy; 2023 Houston Academy. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

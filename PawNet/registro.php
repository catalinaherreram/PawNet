<!DOCTYPE html>
<?php include "inc/cabeceralogin.php"; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        /* Estilos del formulario de registro */
        form {
            margin-top: 20px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px; /* Añadido margen superior para separar el botón del formulario */
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Estilos para el enlace de inicio de sesión */
        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="main.php">Inicio</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Registro</h1>
        <form action="procesaregistro.php" method="post">
            <label for="usuario">Nombre:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <button type="submit">Registrarse</button>
        </form>
        
        <!-- Enlace para volver a la página de inicio de sesión -->
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
    </div>
</body>
<?php include "inc/piedepagina.php"; ?>
</html>


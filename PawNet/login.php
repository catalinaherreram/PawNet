<!DOCTYPE html>
<?php include "inc/cabeceralogin.php"; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <style>
        /* Estilos del formulario de inicio de sesión */
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <form action="login/procesalogin.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <button type="submit">Iniciar sesión</button>
        </form>
        
        <!-- Botón para registrarse -->
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
        <p>¿Eres administrador? <a href="admin.php">Inicia sesión</a>.</p>
    </div>
</body>
<?php include "inc/piedepagina.php"; ?>
</html>


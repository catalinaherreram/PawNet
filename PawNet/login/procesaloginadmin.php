<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar las credenciales del usuario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales del administrador (usuario "pawnet" y contraseña "pawnet")
    if ($usuario === 'pawnet' && $contrasena === 'pawnet') {
        // Iniciar sesión (puedes agregar aquí la lógica de autenticación)
        session_start();

        // Redirigir al panel de control
        header("Location: ../paneldecontrol/controlador.php");
        exit(); // Finalizar el script para evitar que se siga ejecutando
    } else {
        // Credenciales incorrectas, redirigir al formulario de inicio de sesión con un mensaje de error
        header("Location: admin.php?error=credenciales");
        exit(); // Finalizar el script para evitar que se siga ejecutando
    }
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar datos, redirigir al formulario de inicio de sesión
    header("Location: index.php");
    exit(); // Finalizar el script para evitar que se siga ejecutando
}
?>

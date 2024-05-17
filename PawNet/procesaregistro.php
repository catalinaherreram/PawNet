<?php
$host = 'localhost';
$user = 'pawnet';
$password = 'pawnet';
$database = 'pawnet';

$conexion = new mysqli($host, $user, $password, $database);
// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuarios (usuario, email, contrasena) VALUES ('$usuario', '$email', '$contrasena')";

// Ejecutar la consulta y redirigir según el resultado
if ($conexion->query($sql) === TRUE) {
    // Dormir durante 2 segundos
    sleep(2);
    // Redirigir a login.php si la inserción fue exitosa
    header("Location: login.php");
    exit; // Importante para detener la ejecución del script después de la redirección
} else {
    // Dormir durante 2 segundos
    sleep(2);
    // Redirigir de vuelta a registro.php si hay un error en la inserción
    header("Location: registro.php");
    exit;
}

$conexion->close();
?>

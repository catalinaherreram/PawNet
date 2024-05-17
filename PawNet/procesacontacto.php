<?php
$servername = "localhost";
$username = "pawnet";
$password = "pawnet";
$dbname = "pawnet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $prioridad = $_POST['prioridad'];

    $sql = "INSERT INTO formcontacto (nombre, email, asunto, mensaje, prioridad) VALUES ('$nombre', '$email', '$asunto', '$mensaje', '$prioridad')";
    
    if ($conn->query($sql) === TRUE) {
        // Si se insertan los datos correctamente, redirigir de vuelta a la página de contacto con un mensaje de éxito
        header("Location: contacto.php?enviado=exito");
    } else {
        // Si hay un error al insertar los datos, redirigir de vuelta a la página de contacto con un mensaje de error
        header("Location: contacto.php?enviado=error");
    }
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar datos, redirigir a la página de contacto
    header("Location: contacto.php");
}

$conn->close();
?>

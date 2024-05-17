<?php

session_start();
$servername = "localhost";
$username = "pawnet";
$password = "pawnet";
$dbname = "pawnet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT Identificador FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $id_usuario = $fila['Identificador'];
    $_SESSION['iduser'] = $id_usuario;

    header("Location: ../index.php?iduser=$id_usuario");
    exit(); 
} else {

    echo "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
}

$conn->close();
?>


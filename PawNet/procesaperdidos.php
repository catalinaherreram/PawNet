<?php
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "pawnet"; // Nombre de usuario de la base de datos
$password = "pawnet"; // Contraseña de la base de datos
$dbname = "pawnet"; // Nombre de la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $telefono = $_POST['iduser'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $foto = $_POST['foto'];
    
    // Guardar la imagen en el servidor
    $target_dir = "uploads/"; // Directorio donde se guardarán las imágenes
    $foto = $target_dir . basename($_FILES["foto"]["name"]); // Ruta de la imagen en el servidor
    
    // Mover la imagen al directorio de subidas
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $foto)) {
        $sql = "INSERT INTO perdidos (iduser, fecha, tipo, ciudad, descripcion, email, telefono, foto) 
        VALUES ('$id_usuario', '$fecha', '$tipo', '$ciudad', '$descripcion', '$email', '$telefono', '$foto')";

        if ($conn->query($sql) === TRUE) {
            // Si se insertan los datos correctamente, redirigir de vuelta a la página de inicio con un mensaje de éxito
            header("Location: index.php?perdidos=exito");
        } else {
            // Si hay un error al insertar los datos, redirigir de vuelta a la página de inicio con un mensaje de error
            header("Location: index.php?perdidos=error");
        }
    } else {
        // Si falla al subir la imagen, redirigir de vuelta a la página de inicio con un mensaje de error
        header("Location: index.php?perdidos=error_imagen");
    }
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar datos, redirigir a la página de inicio
    header("Location: index.php");
}

$conn->close();
?>

<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");

// Verificar si se pasó un ID y el nombre de la tabla por parámetro
if(isset($_GET['id']) && isset($_GET['tabla'])) {
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];

    // Consulta para obtener los datos del registro correspondiente al ID y a la tabla
    $peticion = "SELECT * FROM $tabla WHERE Identificador = $id;";
    $resultado = mysqli_query($conexion, $peticion);

    // Verificar si se encontraron resultados
    if(mysqli_num_rows($resultado) > 0) {
        // Obtener los datos del registro
        $registro = mysqli_fetch_assoc($resultado);
    } else {
        echo "No se encontraron registros con ese ID en la tabla $tabla.";
        exit; // Salir del script si no se encontraron registros
    }
} else {
    echo "No se proporcionó un ID válido o el nombre de la tabla.";
    exit; // Salir del script si no se proporcionó un ID válido o el nombre de la tabla
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $actualizaciones = "";
    foreach ($_POST as $campo => $valor) {
        // Evitar actualizar el campo "Identificador"
        if ($campo !== "Identificador") {
            // Agregar la actualización al string
            $actualizaciones .= "$campo = '$valor', ";
        }
    }
    $actualizaciones = rtrim($actualizaciones, ", ");
    $consulta = "UPDATE $tabla SET $actualizaciones WHERE Identificador = $id";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        echo "El registro ha sido actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Registro</title>
</head>
<body>
    <h1>Detalles del Registro</h1>
    <form method="post">
        <?php foreach ($registro as $campo => $valor): ?>
            <label for="<?php echo $campo; ?>"><?php echo ucfirst($campo); ?>:</label>
            <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="<?php echo $valor; ?>"><br>
        <?php endforeach; ?>

        <input type="submit" value="Actualizar">
    </form>

    <a href="controlador.php"><button>Volver</button></a>
</body>
</html>

<?php
    mysqli_close($conexion);
?>

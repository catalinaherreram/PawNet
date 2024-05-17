<!DOCTYPE html>
<?php include "inc/cabecera.php"; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <?php
    // Iniciar sesión (si no lo has hecho ya)
    session_start();

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "pawnet";
    $password = "pawnet";
    $dbname = "pawnet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el identificador del usuario actual
    $usuario_id = $_SESSION['iduser'];

    // Si se envió el formulario para eliminar de "perdidos"
    if (isset($_POST['eliminar_perdidos'])) {
        $identificador_a_borrar_perdidos = $_POST['identificador_perdidos'];
        eliminar($conn, 'perdidos', $identificador_a_borrar_perdidos);
    }

    // Si se envió el formulario para eliminar de "encontrados"
    if (isset($_POST['eliminar_encontrados'])) {
        $identificador_a_borrar_encontrados = $_POST['identificador_encontrados'];
        eliminar($conn, 'encontrados', $identificador_a_borrar_encontrados);
    }

    // Función para eliminar un registro de una tabla
    function eliminar($conexion, $tabla, $id) {
        $peticion = "DELETE FROM " . $tabla . " WHERE Identificador = " . $id;
        $resultado = mysqli_query($conexion, $peticion);
        if ($resultado) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conexion);
        }
    }
    ?>

    <form method="post">
        <label for="identificador_perdidos">Identificador a borrar (perdidos):</label>
        <input type="text" id="identificador_perdidos" name="identificador_perdidos" required>
        <button type="submit" name="eliminar_perdidos">Eliminar</button>
    </form>
    <form method="post">
        <label for="identificador_encontrados">Identificador a borrar (encontrados):</label>
        <input type="text" id="identificador_encontrados" name="identificador_encontrados" required>
        <button type="submit" name="eliminar_encontrados">Eliminar</button>
    </form>

    <?php
    // Consulta SQL para seleccionar los registros de la tabla "perdidos" para el usuario actual
    $sql_perdidos = "SELECT * FROM perdidos WHERE iduser = $usuario_id";
    $result_perdidos = $conn->query($sql_perdidos);

    // Mostrar los resultados en una tabla HTML para "perdidos"
    if ($result_perdidos->num_rows > 0) {
        echo "<h2>Registros de perdidos</h2>";
        echo "<table><tr><th>ID</th><th>Fecha</th><th>Tipo</th><th>Provincia</th><th>Descripción</th><th>Email</th><th>Telefono</th></tr>";
        while ($row_perdidos = $result_perdidos->fetch_assoc()) {
            echo "<tr><td>" . $row_perdidos["Identificador"] . "</td><td>" . $row_perdidos["fecha"] . "</td><td>" . $row_perdidos["tipo"] . "</td><td>" . $row_perdidos["ciudad"] . "</td><td>" . $row_perdidos["descripcion"] . "</td><td>" . $row_perdidos["email"] . "</td><td>" . $row_perdidos["telefono"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron registros perdidos para este usuario.</p>";
    }

    // Consulta SQL para seleccionar los registros de la tabla "encontrados" para el usuario actual
    $sql_encontrados = "SELECT * FROM encontrados WHERE iduser = $usuario_id";
    $result_encontrados = $conn->query($sql_encontrados);

    // Mostrar los resultados en una tabla HTML para "encontrados"
    if ($result_encontrados->num_rows > 0) {
        echo "<h2>Registros de encontrados</h2>";
        echo "<table><tr><th>ID</th><th>Fecha</th><th>Tipo</th><th>Provincia</th><th>Descripción</th><th>Email</th><th>Telefono</th></tr>";
        while ($row_encontrados = $result_encontrados->fetch_assoc()) {
            echo "<tr><td>" . $row_encontrados["Identificador"] . "</td><td>" . $row_encontrados["fecha"] . "</td><td>" . $row_encontrados["tipo"] . "</td><td>" . $row_encontrados["ciudad"] . "</td><td>" . $row_encontrados["descripcion"] . "</td><td>" . $row_encontrados["email"] . "</td><td>" . $row_encontrados["telefono"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron registros encontrados para este usuario.</p>";
    }

    $conn->close();
    ?>
    
    <?php include "inc/piedepagina.php"; ?>
</body>
</html>
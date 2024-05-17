<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie de Página Estilizado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Utilizando la técnica clearfix para limpiar los floats */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        footer p {
            margin: 0;
            font-size: 14px;
        }
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="clearfix"></div>
    <!-- Pie de página estilizado -->
    <footer>
        <div class="footer-content">
            <?php
                // Conexión a la base de datos
                $mysqli = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");
                // Verificar la conexión
                if (!$mysqli) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Consulta para obtener el contenido del pie de página
                $query = "SELECT * FROM piedepagina";
                $result = mysqli_query($mysqli, $query);

                // Mostrar el contenido del pie de página si está disponible
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<p>' . $row['footer'] . '</p>';
                    }
                } else {
                    // Mensaje en caso de que no haya contenido disponible en el pie de página
                    echo '<p>No hay contenido disponible</p>';
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($mysqli);
            ?>
        </div>
    </footer>
</body>
</html>

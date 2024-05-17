<!doctype html>
<html lang="es">
<head>
    <title>PawNet</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo/estilo.css">
    <link rel="icon" href="img/animales.png">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="¡Bienvenido a PawNet!">
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        img {
            width: 50px;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        h1, h2 {
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <h1><img src="img/animales.png" id="logo">PawNet</h1> <!-- Imagen y título del sitio -->
        <h2>Uniendo huellas</h2> <!-- Subtítulo -->
        <!-- Menú de navegación -->
        <nav>
            <ul>
                <?php
                    // Conexión a la base de datos
                    $mysqli = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");
                    $query = "SELECT * FROM navegacion";
                    $result = mysqli_query($mysqli, $query);
                    // Recorriendo los elementos de navegación
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <li>
                                <a href="' . $row['href'] . '">' . $row['item'] . '</a>
                            </li>
                        ';
                    }
                ?>
            </ul>
        </nav>
    </header>
    <main>
    </main>
</body>
</html>

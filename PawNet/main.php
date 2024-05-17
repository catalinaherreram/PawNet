<!DOCTYPE html>
<?php include "inc/cabeceralogin.php"; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawnet - Inicio</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* Estilos del menú de navegación */
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

        /* Estilos del ribbon */
        .ribbon-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .ribbon {
            width: 45%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px; 
        }

        .ribbon h2 {
            margin-bottom: 10px;
        }

        .ribbon div {
            display: flex;
            align-items: center; 
            margin-bottom: 15px;
        }

        .ribbon img {
            width: 100px;
            height: auto; 
            border-radius: 5px; 
            margin-right: 10px;
        }

        .ribbon p {
            margin-bottom: 5px;
        }

        .ribbon button {
            background-color: #fff;
            color: #007bff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .ribbon button:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a nuestra página de Mascotas Perdidas</h1>
        <p>Encuentra mascotas perdidas cerca de ti o reporta una mascota que has encontrado.</p>
    </div>

    <!-- Contenedor para las ribbons -->
    <div class="ribbon-container">
        <!-- Ribbon para las últimas mascotas encontradas -->
        <div class="ribbon">
            <h2>Últimas mascotas encontradas</h2>
            <?php 
                $mysqli = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");

                $query = "SELECT * FROM encontrados ORDER BY fecha DESC LIMIT 3";

                $result = mysqli_query($mysqli, $query);

                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']); ?>" alt="Mascota encontrada">
                    <p>Fecha: <?php echo $row['fecha']; ?></p>
                    <p>Tipo: <?php echo $row['tipo']; ?></p>
                    <p>Ciudad: <?php echo $row['ciudad']; ?></p>
                    <p>Descripción: <?php echo $row['descripcion']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>Teléfono: <?php echo $row['telefono']; ?></p>
                </div>
            <?php } ?>
            <button onclick="window.location.href='login.php'">Ver más</button>
        </div>

        <!-- Ribbon para las últimas mascotas perdidas -->
        <div class="ribbon">
            <h2>Últimas mascotas perdidas</h2>
            <?php 
                $mysqli = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");

                $query = "SELECT * FROM perdidos ORDER BY fecha DESC LIMIT 3";

                $result = mysqli_query($mysqli, $query);

                /* fetch associative array */
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']); ?>" alt="Mascota perdida">
                    <p>Fecha: <?php echo $row['fecha']; ?></p>
                    <p>Tipo: <?php echo $row['tipo']; ?></p>
                    <p>Ciudad: <?php echo $row['ciudad']; ?></p>
                    <p>Descripción: <?php echo $row['descripcion']; ?></p>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>Teléfono: <?php echo $row['telefono']; ?></p>
                </div>
            <?php } ?>
            <button onclick="window.location.href='login.php'">Ver más</button>
        </div>
    </div>

    <?php include "inc/piedepagina.php"; ?>
</body>
</html>
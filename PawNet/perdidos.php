<!DOCTYPE html>
<?php include "inc/cabecera.php"; ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas Perdidas</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
        }

        /* Estilos del formulario */
        form {
            margin-top: 20px;
            text-align: left;
        }

        label, input, select, textarea {
            display: block;
            margin-bottom: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Mascotas Perdidas</h1>
        <p>Consulta la información sobre mascotas que han sido reportadas como perdidas.</p>

        <!-- Formulario para reportar mascotas perdidas -->
        <form action="procesaperdidos.php" method="post" enctype="multipart/form-data">
            <label for="fecha">Fecha en la que se ha perdido la mascota:</label>
            <input type="date" id="fecha" name="fecha" required>
            <label for="tipo">Tipo de mascota:</label>
            <select id="tipo" name="tipo" required>
                <option value="perro">Perro</option>
                <option value="gato">Gato</option>
                <option value="otro">Otro</option>
            </select>
            <label for="ciudad">Provincia en la que se ha perdido la mascota:</label>
            <input type="text" id="ciudad" name="ciudad" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="email">Correo de contacto:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefono">Teléfono de contacto:</label>
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]{9}" required placeholder="Formato: 123456789">
            <label for="foto">Foto de la mascota (formato png):</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <button type="submit">Publicar mascota perdida</button>
        </form>
        
        <!-- Ribbon para las últimas mascotas perdidas -->
        <div class="ribbon">
            <h2>Últimas mascotas perdidas</h2>
            <?php
            $mysqli = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");

            $query = "SELECT * FROM perdidos ORDER BY fecha DESC";

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
        </div>
    </div>
</body>
<?php include "inc/piedepagina.php"; ?>
</html>


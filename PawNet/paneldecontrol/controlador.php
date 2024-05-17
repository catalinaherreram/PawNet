<!doctype html>
<html>
<head>
    <style>
        body{
            font-family: sans-serif;
        }
        button{
            background:green;
            color:white;
            border:none;
            border-radius:50px;
            padding:10px;
            margin:5px;
        }
        table tr:nth-child(odd){
            background:rgb(230,230,230);
        }
        table tr:first-child{
            background:black;
            color:white;
        }
    </style>
</head>
<body>
<?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "pawnet", "pawnet", "pawnet");

    // Incluyendo el archivo de la clase Controlador
    include "clase.php";

    // Crear instancia de Controlador para el menú de tablas y mostrarlo
    $menu = new Controlador();
    echo $menu->tablas($conexion);

    // Crear instancia de Controlador para el contenido de la tabla
    $contenido = new Controlador();
    
    // Verificar si se solicita eliminar un registro
    if(isset($_GET['id'])){
        $contenido->eliminar($conexion,$_GET['tabla'],$_GET['id']);
    }
    
    // Verificar si se solicita procesar una inserción de datos
    if(isset($_GET['operacion'])){
        $contenido->procesaInsertar($conexion,$_GET['tabla']);
    }
    
    // Mostrar el contenido de la tabla y el formulario de inserción
    echo $contenido->listar($conexion,$_GET['tabla']);
    echo $contenido->insertar($conexion,$_GET['tabla']);
?>
</body>
</html>

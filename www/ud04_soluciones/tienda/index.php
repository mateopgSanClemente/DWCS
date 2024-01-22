<?php

  session_start();
  require "lib/base_datos.php";
  require "lib/utilidades.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous">
    </script>
    <?php
        $conexion = get_conexion();
        crear_bd_tienda($conexion);
        seleccionar_bd_tienda($conexion);
        crear_tabla_usuarios($conexion);
        crear_tabla_productos($conexion);
        cerrar_conexion($conexion);
    ?>
    <p>
        <a class="btn btn-primary" href="login.php" role="button"> Login</a>
        <a class="btn btn-primary" href="logout.php" role="button"> Logout</a>
    </p>
    <p>
        <a class="btn btn-primary" href="dar_de_alta.php" role="button"> Alta usuarios</a>
        <a class="btn btn-primary" href="listar.php" role="button"> Listar usuarios</a>
    </p>
    <p>
        <a class="btn btn-primary" href="dar_de_alta_producto.php" role="button"> Alta producto</a>
        <a class="btn btn-primary" href="dar_de_alta_producto_multiple.php" role="button"> Alta producto múltiple</a>
        <a class="btn btn-primary" href="dar_de_alta_producto_multiple_folder.php" role="button"> Alta producto múltiple carpetas</a>
    </p>
    <p><?= get_visitas();?>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
        <p>Usuario: <?= get_logged_name()?></p>
    </footer>
</body>

</html>

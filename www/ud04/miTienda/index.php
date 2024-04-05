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
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
    //También podría utilizar un require
        include("lib/base_datos.php");
        //MEDIANTE PDO:
        //Crear la conexion
        $conPDO = get_conexion();
        //Crear la base de datos
        crear_bd_tienda($conPDO);
        //Seleccionar bd tienda:
        seleccionar_bd_tienda($conPDO);
        //Crear tabla cliente
        crear_tabla_mysql($conPDO);
        //Cerrar conexión
        cerrarConexion($conPDO);
        /* Desde el punto de vista profesional, no se incluyen buenas práctivas en el 
        desarrollo de la base de datos. Por ejemplo, cada vez que se recargar index.php,
        no tiene sentid hacer esto.
         */
    ?>
    <p>
        <a class="btn btn-primary" href="dar_de_alta.php" role="button"> Alta usuarios</a>
        <a class="btn btn-primary" href="listar.php" role="button"> Listar usuarios</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
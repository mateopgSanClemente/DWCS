<?php
    include("lib/base_datos.php");
    if(!isset($_COOKIE["visitas"])){
        setcookie("visitas", 0, time()+(86400*30), "/");
    }else{
        $_COOKIE["visitas"]++;
        setcookie("visitas", $_COOKIE["visitas"], time()+(86400*30),"/");
    }
    echo "Visitas totales: ".$_COOKIE["visitas"]."<br>";
    /*
    session_start();
    if(!isset($_SESSION["count"])){
        $_SESSION["count"]=0;
    }else{
        $_SESSION["count"]++;
    }
    echo $_SESSION["count"];*/
    //Para hacerlo con cookies (escoger hacerlo mediante cookies o session, las dos al mismo tiempo no funcionan):
    
    
    //También podría utilizar un require
    
    //MEDIANTE PDO:
    //Crear la conexion
    $conPDO = get_conexion();
    //Crear la base de datos
    crear_bd_tienda($conPDO);
    //Seleccionar bd tienda:
    seleccionar_bd_tienda($conPDO);
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
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <?php
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
        <a class="btn btn-primary" href="idioma.php" role="button"> Seleccionar idioma</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
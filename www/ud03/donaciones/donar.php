<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
    }
    if(isset($_POST["submit"])){
        include ("lib/base_datos.php");
        $idDonante=$_POST["id"];
        $fechaDonacion=$_POST["fechaDonacion"];
        $conPDO=crear_conexion();
        seleccionar_bd_donaciones($conPDO);
        registrar_donacion($conPDO,$idDonante,$fechaDonacion);
        $conPDO=null;
        header("Location: listar_donantes.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Alta de donación</h1>
    <div>
        Formulario para dar de alta una donación
    </div>
        <form action="donar.php" method="POST">
            <label for="fechaDonacion">Fecha</label>
            <input type="date" name="fechaDonacion" id="fechaDonacion" required>
            <input type="submit" name="submit" id="submit" value="Donar">
            <input type="hidden" name="id" value="<?= $id;?>">
        </form>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>
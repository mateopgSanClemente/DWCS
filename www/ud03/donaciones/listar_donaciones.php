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
    <h1>Gestión donacion de Sangre</h1>
    <div>
        Listado de donaciones
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID donante</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Grupo sanguineo</th>
                    <th>Fecha donación</th>
                    <th>Fecha proxima donación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include ("lib/base_datos.php");
                    $idDonante=$_GET["id"];
                    $conPDO=crear_conexion();
                    seleccionar_bd_donaciones($conPDO);
                    mostrar_donaciones($conPDO,$idDonante);
                    $conPDO=null;
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>
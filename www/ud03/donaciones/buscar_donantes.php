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
    <h1>Buscar donantes</h1>
    <div>
        Formulario para buscar donantes por codigo postal
        <form action="buscar_donantes.php" method="POST">
            <label for="codigoPostal">Código postal:</label>
            <input type="text" name="codigoPostal" id="codigoPostal" maxlength="5" minlength="5" pattern="\d{5}" placeholder="Ej:36600">
            <input type="submit" name="submitPostal" value="Buscar por codigo">
        </form>
        <form action="buscar_donantes.php" method="POST">
            <label for="grupoSanguineo">Grupo sanguineo:</label>
            <select name="grupoSanguineo" id="grupoSanguineo" required>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
            </select>
            <input type="submit" name="submitGrupo" value="Buscar por grupo">
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grupo sanguineo</th>
                <th>Código postal</th>
                <th>Fecha proxima donación</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include ("lib/base_datos.php");
                if(isset($_POST["submitPostal"])){
                    $codigoPostal=$_POST["codigoPostal"];
                    if(strlen($codigoPostal)==5){
                        $conPDO=crear_conexion();                      
                        seleccionar_bd_donaciones($conPDO);
                        buscar_donante_codigo_postal($conPDO, $codigoPostal);
                        $conPDO=null;
                    }
                } else if (isset($_POST["submitGrupo"])){
                    $grupoSanguineo=$_POST["grupoSanguineo"];
                    if($grupoSanguineo=="A+" || $grupoSanguineo=="A-" || $grupoSanguineo=="B+" || $grupoSanguineo=="B-" || $grupoSanguineo=="AB+" && $grupoSanguineo=="AB-" && $grupoSanguineo=="O+" && $grupoSanguineo=="O-"){
                        $conPDO=crear_conexion();
                        seleccionar_bd_donaciones($conPDO);
                        buscar_donante_grupo_sanguineo($conPDO, $grupoSanguineo);
                        $conPDO=null;
                    }
                }
                
            ?>
        </tbody>
    </table>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>
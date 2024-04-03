<?php
    if(isset($_POST["submit"])){
        if($_POST["edad"]<18){
            echo"La edad es inferior a 18 años.<br>";
        }
        if(strlen($_POST["codigoPostal"])!=5){
            echo"El codigo postal debe tener 5 dígitos.";
        }
        if(strlen($_POST["telefonoMovil"])!=9){
            echo"El teléfono debe tener 9 dígitos.";
        }
        if($_POST["edad"]>=18 && strlen($_POST["codigoPostal"])==5 && strlen($_POST["telefonoMovil"])==9){
            include("lib/base_datos.php");
            $conPDO=crear_conexion();
            seleccionar_bd_donaciones($conPDO);
            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellidos"];
            $edad=$_POST["edad"];
            $grupoSanguineo=$_POST["grupoSanguineo"];
            $codigoPostal=$_POST["codigoPostal"];
            $telefonoMovil=$_POST["telefonoMovil"];
            $codigoPostal=intval($codigoPostal);
            $telefonoMovil=intval($telefonoMovil);
            registrar_donante($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $codigoPostal, $telefonoMovil);
            $conPDO=null;
        }
    };
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
    <h1>Alta de donante</h1>
    <div>
        Formulario para dar de alta un donante
        <form action="dar_alta_donante.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" minlength="0" maxlength="50" required>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" minlength="0" maxlength="200" required>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="18" max="120" step="1" required>
            <label for="grupoSanguineo">Grupo Sanguineo:</label>
            <select name="grupoSanguineo" id="grupoSanguineo" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <!--LOS CAMPOS 'codigoPostal' y 'telefono' DE LA TABLA 'donantes' RECOGEN DATOS DE TIPO NÚMERICO, HAY FALLO SI USO UN CAMPO DE TIPO NUMERICO PARA RECOGER LOS DATOS EN EL FORMULARIO?-->
            <label for="codigoPostal">Codigo postal:</label>
            <input type="text" name="codigoPostal" id="codigoPostal" minlength="5" maxlength="5" pattern="\d{5}" placeholder="Introduce un CP de 5 dígitos"required>
            <label for="telefonoMovil">Telefono móvil:</label>
            <input type="text" name="telefonoMovil" id="telefonoMovil" minlength="9" maxlength="9" pattern="\d{9}" placeholder="Introduce un teléfono de 9 dígitos" required>
            <input type="submit" name="submit" id="submit" value="Dar de alta">
        </form>
    </div>
    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>
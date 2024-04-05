<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>
    <?php
        include ("lib/base_datos.php");
        include ("lib/utilidades.php");
        //Comprobar se veñen datos polo $_POST OJO!-> Solo si llegaron datos vía POST
        if(!empty($_POST)){
            //Conexión
            $conPDO=get_conexion();
            //Seleccionar bd
            seleccionar_bd_tienda($conPDO);
            //Executar o INSERT con cada elemento que se pasa a través del POST
            $nombre=test_input($_POST["nombre"]);
            $apellidos=test_input($_POST["apellidos"]);
            $edad=test_input($_POST["edad"]);
            $provincia=test_input($_POST["provincia"]);
            if(!empty($nombre) && !empty($apellidos) && !empty($edad) && !empty($provincia)){
                insertar_datos_tabla($conPDO, $nombre, $apellidos, $edad, $provincia);
            }
            //Cerrar conexión
            cerrarConexion($conPDO);
        }else{
            echo"El array POST se encuentra vacío.";
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->
    <form action="dar_de_alta.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" requiered>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="0" max="120" step="1" required>
        <label for="provincia">Provincia:</label>
        <select name="provincia" id="provincia" required>
            <option value="pontevedra">Pontevedra</option>
            <option value="ourense">Ourense</option>
            <option value="corunha">Coruña</option>
            <option value="lugo">Lugo</option>
        </select>
        <input type="submit" name="submit" value="Dar de alta">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
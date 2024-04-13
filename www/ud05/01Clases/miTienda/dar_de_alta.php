<?php
    if(!isset($_COOKIE["visitas"])){
        setcookie("visitas", 0, time()+(86400*30), "/");
    }else{
        $_COOKIE["visitas"]++;
        setcookie("visitas", $_COOKIE["visitas"], time()+(86400*30),"/");
    }
    echo "Visitas totales: ".$_COOKIE["visitas"]."<br>";
?>
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
        require_once ("lib/base_datos.php");
        require_once ("lib/utilidades.php");
        require_once ("Usuario.php");
        //Comprobar se veñen datos polo $_POST OJO!-> Solo si llegaron datos vía POST
        if(!empty($_POST)){
            //Conexión
            $conPDO=get_conexion();
            //Seleccionar bd
            seleccionar_bd_tienda($conPDO);
            $nombre=test_input($_POST["nombre"]);
            $apellidos=test_input($_POST["apellidos"]);
            $edad=test_input($_POST["edad"]);
            $provincia=test_input($_POST["provincia"]);
            //Recoger y cifrar contraseña: la contraseña cifrada debe tener un máximo de 50 caracteres, así que aunque no sea lo ideal, voy a usar cifrado 
            $password = test_input($_POST["password"]);
            $usuario = new Usuario($nombre, $apellidos, $edad, $provincia, $password);
            $passwordCifrada = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);
            if(!empty($usuario->getNombre()) && !empty($usuario->getApellidos()) && !empty($usuario->getEdad()) && !empty($usuario->getProvincia()) && !empty($usuario->getPassword())){
                insertar_datos_tabla($conPDO, $usuario->getNombre(), $passwordCifrada, $usuario->getApellidos(), $usuario->getEdad(), $usuario->getProvincia());
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
    <form action="<?php echo test_input($_SERVER["PHP_SELF"])?>" method="POST"> <!--También podría utilizar $_SERVER["PHP_SELF"] para hacer referencia a la misma página dar_de_alta.php-->
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" requiered>
        <br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="0" max="120" step="1" required>
        <br><br>
        <label for="provincia">Provincia:</label>
        <select name="provincia" id="provincia" required>
            <option value="pontevedra">Pontevedra</option>
            <option value="ourense">Ourense</option>
            <option value="corunha">Coruña</option>
            <option value="lugo">Lugo</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Dar de alta">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
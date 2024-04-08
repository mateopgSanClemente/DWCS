<?php
    if(!isset($_COOKIE["visitas"])){
        setcookie("visitas", 0, time()+(86400*30), "/");
    }else{
        $_COOKIE["visitas"]++;
        setcookie("visitas", $_COOKIE["visitas"], time()+(86400*30),"/");
    }
    echo "Visitas totales: ".$_COOKIE["visitas"]."<br>";
    include ("lib/base_datos.php");
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
        $conPDO=get_conexion();
        //Seleccionar bd
        seleccionar_bd_tienda($conPDO);
        //Obter os datos de $_POST
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellidos"];
        $edad=$_POST["edad"];
        $provincia=$_POST["provincia"];
        //Executar UPDATE
        editar_cliente($conPDO, $id, $nombre, $apellidos, $edad, $provincia);
        header("Location: listar.php");
        exit;
    }
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
    <h1>Editar usuario </h1>
    <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Provincia</th>
      </tr>
    <?php
        $conPDO=get_conexion();
        //Seleccionar bd
        seleccionar_bd_tienda($conPDO);
        //Inicializar las variables
        //Obter id de $_GET
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            //Consultar datos de ese id
            $clientes = consulta_id($conPDO, $id);
            foreach($clientes as $cliente){
                echo "<tr>";
                    foreach($cliente as $dato){
                        echo"<td>$dato</td>";
                    }
                echo"</tr>";
            }
            
            $nombre = $clientes[0]['nombre'];
            $apellidos = $clientes[0]["apellido"];
            $edad = $clientes[0]["edad"];
            $provincia = $clientes[0]["provincia"];
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de edición</p>
    <!-- o "action" chama a editar.php de xeito reflexivo-->
    <form action="editar.php" method=POST>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo"$nombre";?>" requiered>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo"$apellidos";?>" required>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="0" max="120" step="1" value="<?php echo"$edad";?>" required>
        <label for="provincia">Provincia:</label>
        <select name="provincia" id="provincia" required>
            <option value="pontevedra">Pontevedra</option>
            <option value="ourense">Ourense</option>
            <option value="corunha">Coruña</option>
            <option value="lugo">Lugo</option>
        </select>
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!--Que se supone que hace esta línea?-->
        <input type="submit" name="submit" value="Actualizar">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>
</html>
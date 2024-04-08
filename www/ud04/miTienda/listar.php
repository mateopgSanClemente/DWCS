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
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>Lista de usuarios con enlaces para borrar y editar</p>

    <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Provincia</th>
        <th scope="col">Borrar</th>
        <th scope="col">Editar</th>
      </tr>
      <?php
        include ("lib/base_datos.php");
        //Obter conexión
        $conPDO = get_conexion();
        //Seleccionar bd
        seleccionar_bd_tienda($conPDO);
        //Consulta obtención dos usuarios (array)
        $clientes = consulta($conPDO);
        //consulta_alternativa($conPDO);
        //Crear lista de usuarios
        //  - cada usuario mostra dous enlaces (editar e borrar)
        //  - editar.php?id=4
        //  - borrar.php?id=7       
        //Imprimir Clientes
        
        foreach($clientes as $cliente){
            echo "<tr>";
            foreach($cliente as $dato){
                echo"<td>$dato</td>";
            }
            echo"<td><a href=\"borrar.php?id=".$cliente["id"]."\">Borrar</a></td>";
            echo"<td><a href=\"editar.php?id=".$cliente["id"]."\">Editar</a></td>";
            echo"</tr>";
        }
    ?>
    </thead>
    <tbody>

<?php

?>
    </tbody>
</table>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
<?php
require "lib/base_datos.php";
require "lib/utilidades.php";
    if(!empty($_POST)){
        $conPDO = get_conexion();
        seleccionar_bd_tienda($conPDO);
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $passwordAlmacenada = recuperarPassword($conPDO, $usuario);
        $verificarPassword = password_verify($password, $passwordAlmacenada);
        if($verificarPassword){
            header("Location: index.php");
        }else{
            echo "PASSWORD INCORRECTO";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login:</h1>
    <form action="login.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br><br>
        <label for="password" name="password" id="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Log">
    </form>
    <footer>
        <p>
            <a href="index.php">Volver a la página de inicio</a>
        </p>
    </footer>
</body>
</html>
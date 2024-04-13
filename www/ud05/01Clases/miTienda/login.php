<?php
require "lib/base_datos.php";
require "lib/utilidades.php";
$usuario = "";
$password = "";
//PROBLEMA: El código no funciona si un nombre de usuario está repetido en la tabla usuarios.
session_start();
    if(!empty($_POST)){
        $conPDO = get_conexion();
        seleccionar_bd_tienda($conPDO);
        $validarUsuario = false;
        $validarPassword = false;

        if (is_string($_POST["usuario"])){
            $usuario = $_POST["usuario"];
            $comprobarUsuario = comprobarUsuario($conPDO, $usuario);
            if ($comprobarUsuario > 0){
                $validarUsuario = true;
            } else {
                echo "El nombre introducido no existe en la base de datos.";
            }
        } else {
            echo "<br>El nombre introducido no es válido.";
        }
        if (is_string($_POST["password"])){
            $password = $_POST["password"];
            $validarPassword = true;
        } else {
            echo "<br>La contraseña introducida no es válida.";
        }

        $passwordAlmacenada = recuperarPassword($conPDO, $usuario);
        $verificarPassword = password_verify($password, $passwordAlmacenada);
        if($verificarPassword && $validarPassword && $validarUsuario){
            $_SESSION["usuario"] = $usuario;
            header("Location: index.php");
            exit;
        }else{
            echo "<br>PASSWORD INCORRECTO";
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
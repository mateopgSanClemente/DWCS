<?php
function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function contarVisitarSesion(){
    session_start();
    if(!isset($_SESSION["visitas"])){
        $_SESSION["visitas"]=0;
    }else{
        $_SESSION["visitas"]++;
        echo $_SESSION["visitas"];
    }
}

function contarVisitarCookie(){
    if(!isset($_COOKIE["visitas"])){
        setcookie("visitas", 0, time()+(86400*30), "/");
    }else{
        $visitas=$_COOKIE["visitas"];
        $visitas++;
        setcookie("visitas", $visitas, time()+(86400*30), "/");
        echo $_COOKIE["visitas"];
    }
}
?>
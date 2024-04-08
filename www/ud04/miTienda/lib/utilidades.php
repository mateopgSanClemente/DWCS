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

function compruebaExtension(){
    $carpetaFotografias="fotografias/";
    $direccionFichero=$carpetaFotografias.basename($_FILES["fileToUpload"]["name"]);//basename() devuelve solo la ruta del archivo. $_FILES["fileToUpload"]["name"] devuelve el nombre original del archivo que se está cargando a través de un formulario HTML.
    $tipoExtension=strtolower(pathinfo($direccionFichero, PATHINFO_EXTENSION));
    if ($tipoExtension == "png" || $tipoExtension == "jpg" || $tipoExtension == "jpeg" || $tipoExtension == "gif"){
        return true;
    } else {
        return false;
    }
}

function comprobarTamanho(){
    if($_FILES["fileToUpload"]["size"]>5000000){
        echo"El fichero es demasiado grande, no puede superar los 50Mb.";
        return false;
    }else{
        return true;
    }
}
?>
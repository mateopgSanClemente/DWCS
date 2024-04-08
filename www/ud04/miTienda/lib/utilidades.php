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

//Adaptar para que recoja paŕametros:
function compruebaExtension($archivo){
    $carpetaFotografias="fotografias/";
    if(!is_array($archivo)){
        $direccionFichero=$carpetaFotografias.basename($archivo["name"]);//basename() devuelve solo la ruta del archivo. $_FILES["fileToUpload"]["name"] devuelve el nombre original del archivo que se está cargando a través de un formulario HTML.
        $tipoExtension=strtolower(pathinfo($direccionFichero, PATHINFO_EXTENSION));
        return in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"));
    }else{
        $comprobarArray=array();
        foreach($archivo as $file){
            $direccionFichero = $carpetaFotografias . basename($file["name"]);
            $tipoExtension = strtolower(pathinfo($direccionFichero, PATHINFO_EXTENSION));
            if(!in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"))){
                return false;
            }
        }
    }
    return true;
}

function comprobarTamanho($fichero){
    if(!is_array($fichero)){
        if($fichero["size"]>50000000){
            echo"El fichero es demasiado grande, no puede superar los 50Mb.";
            return false;
        }else{
            return true;
        }
    }else{
        foreach($fichero as $file){
            if($file["size"]>50000000){
                return false;
            }
        }
    }
    return true;
}
?>
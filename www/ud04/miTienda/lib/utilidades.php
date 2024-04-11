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
/**
 * No me gusta como está llevada la lógica de la función,d
 */
function comprobarExtension($archivo, $directorioArchivo){
    if(is_string($archivo)){
        $direccionFichero=$directorioArchivo.basename($archivo["name"]);//basename() devuelve solo la ruta del archivo. $_FILES["fileToUpload"]["name"] devuelve el nombre original del archivo que se está cargando a través de un formulario HTML.
        $tipoExtension=strtolower(pathinfo($direccionFichero, PATHINFO_EXTENSION));
        return in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"));
    }elseif(is_array($archivo)){
        foreach($archivo as $file){
            $direccionFichero = $directorioArchivo . basename($file);
            $tipoExtension = strtolower(pathinfo($direccionFichero, PATHINFO_EXTENSION));
            if(!in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"))){
                return false;
            }
        }
        return true;
    }
    return false;
}

//En mi caso $fichero debe ser igual a '$_FILES["fileToUpload"]'
function comprobarTamanho($tamanhoArchivo){
    if(is_int($tamanhoArchivo)){
        if($tamanhoArchivo>50000000){
            echo"El fichero es demasiado grande, no puede superar los 50Mb.";
            return false;
        }else{
            return true;
        }
    }elseif(is_array($tamanhoArchivo)){
        foreach($tamanhoArchivo as $file){
            if($file>50000000){
                echo"Uno de los ficheros es demasiado grande, no puede superar los 50Mb.";
                return false;
            }
        }
        return true;
    }  
}
?>
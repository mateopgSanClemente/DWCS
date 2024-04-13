<?php
//CONTAR VISITAS
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

//SUBIR PRODUCTO. Queda el último punto, seleccionar el fichero según su extensión y guardarlo en la carpeta que convenga
function comprobarExtension($archivo, $directorioArchivo){
    if(is_string($archivo)){
        $nombreArchivo=$directorioArchivo.basename($archivo["name"]);//basename() devuelve solo la ruta del archivo. $_FILES["fileToUpload"]["name"] devuelve el nombre original del archivo que se está cargando a través de un formulario HTML.
        $tipoExtension=strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        return in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"));
    }elseif(is_array($archivo)){
        foreach($archivo as $file){
            $nombreArchivo = $directorioArchivo . basename($file);
            $tipoExtension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
            if(!in_array($tipoExtension, array("png", "jpg", "jpeg", "gif"))){
                return false;
            }
        }
        return true;
    }
    return false;
}

function devolverExtension($archivo, $directorioArchivo){
    if(is_string($archivo)){
        $nombreArchivo=$directorioArchivo.basename($archivo["name"]);//basename() devuelve solo la ruta del archivo. $_FILES["fileToUpload"]["name"] devuelve el nombre original del archivo que se está cargando a través de un formulario HTML.
        $tipoExtension=strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        return $tipoExtension;
    }
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

function subirArchivo($archivoNombre, $archivoTmp, $targetDir="fotografias/"){
    if (is_array($archivoNombre)){
        for ($i=0; $i < count($archivoNombre); $i++){
            $targetFile = $targetDir . basename($archivoNombre[$i]);
            $resultado = move_uploaded_file($archivoTmp[$i], $targetFile);
            if(!$resultado){
                return false;
            }
        }
        return true;
    } elseif (is_string($archivoNombre)){
        $targetFile = $targetDir . basename($archivoNombre);
        $resultado = move_uploaded_file($archivoTmp, $targetFile);
        if(!$resultado){
            return false;
        }
        return true;
    }
    return false;
}

//LOGIN


?>
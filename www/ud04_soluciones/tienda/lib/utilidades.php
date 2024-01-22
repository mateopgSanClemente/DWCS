<?php

function test_input($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function get_visitas()
{
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    } else {
        $_SESSION['count']++;
    }
      
    return "Visita número:" .  $_SESSION['count'];
}

function imprimir_idioma()
{
    if (!isset($_COOKIE['idioma'])) {
        echo "Selecciona un idioma";
    } else {
        switch ($_COOKIE['idioma']) {
            case "es":
                echo "<p>Bienvenido/a a mi página.</p>";
                break;
            case "gal":
                echo "<p>Benvido/a a miña páxina.</p>";
                break;
            case "en":
                echo "<p>Wellcome to my page.</p>";
                break;
        }
    }
}

function get_mensajes_html_format($mensajes)
{
    $resultado = "";

    if (count($mensajes) > 0) {
        foreach ($mensajes as $mensaje) {
            if ($mensaje[0] == "error") {
                $resultado .= '<div class="alert alert-danger" role="alert">' . $mensaje[1] . '</div>';
            } elseif ($mensaje[0] == "success") {
                $resultado .= '<div class="alert alert-success" role="alert">' . $mensaje[1] . '</div>';
            }
        }
    }

    return $resultado;
}

function es_valido_fichero($archivo, $targetDir = "uploads/")
{
    $mensajes = array();

    $targetFile = $targetDir . basename($archivo["name"]);
    $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $nombre = $archivo["name"];
    $tamanho = $archivo["size"];
    $archivo_temporal = $archivo["tmp_name"];


    if (!file_exists($targetFile)) {
        if (compruebaTamanho($tamanho)) {
            if (compruebaExtension($extension)) {
                return true;
            } else {
                $mensajes[] = array("error", "Introduce un archivo en formato jpg, png o gif");
            }
        } else {
            $mensajes[] = array("error", "El fichero es demasiado grande");
        }
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }

    return $mensajes;
}

function es_valido_fichero_multiple($archivos, $index, $targetDir = "uploads/")
{
    $mensajes = array();

    $targetFile = $targetDir . basename($archivos["name"][$index]);
    $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $nombre = $archivos["name"][$index];
    $tamanho = $archivos["size"][$index];
    $archivo_temporal = $archivos["tmp_name"][$index];


    if (!file_exists($targetFile)) {
        if (compruebaTamanho($tamanho)) {
            if (compruebaExtension($extension)) {
                return true;
            } else {
                $mensajes[] = array("error", "Introduce un archivo en formato jpg, png o gif");
            }
        } else {
            $mensajes[] = array("error", "El fichero es demasiado grande");
        }
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }

    return $mensajes;
}

function es_valido_fichero_multiple_folder($archivos, $index)
{
    $mensajes = array();

    $targetDir = get_target_dir($archivos["name"][$index]);

    $targetFile = $targetDir . basename($archivos["name"][$index]);
    $extension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $nombre = $archivos["name"][$index];
    $tamanho = $archivos["size"][$index];
    $archivo_temporal = $archivos["tmp_name"][$index];


    if (!file_exists($targetFile)) {
        if (compruebaTamanho($tamanho)) {
            return true;
        } else {
            $mensajes[] = array("error", "El fichero es demasiado grande");
        }
    } else {
        $mensajes[] = array("error", "El fichero ya existe");
    }

    return $mensajes;
}

function subir_fichero($archivo, $targetDir = "uploads/")
{
    $targetFile = $targetDir . basename($archivo["name"]);
    return $resultado = move_uploaded_file($archivo['tmp_name'], $targetFile);
}

function subir_fichero_multiple($archivos, $index, $targetDir = "uploads/")
{
    $targetFile = $targetDir . basename($archivos["name"][$index]);
    return $resultado = move_uploaded_file($archivos['tmp_name'][$index], $targetFile);
}

function subir_fichero_multiple_folder($archivos, $index)
{
    $targetDir = get_target_dir($archivos["name"][$index]);
    $targetFile = $targetDir . basename($archivos["name"][$index]);
    return $resultado = move_uploaded_file($archivos['tmp_name'][$index], $targetFile);
}

function compruebaTamanho($tamanho)
{
    if ($tamanho < 5000000) {
        return true;
    } else {
        return false;
    }
}

function compruebaExtension($extension)
{
    switch ($extension) {
        case 'jpg':
        case 'png':
        case 'jpeg':
        case 'gif':
            return true;
            break;
        
        default:
            return false;
            break;
    }
}

function isImage($extension)
{
    switch ($extension) {
        case 'jpg':
        case 'png':
        case 'jpeg':
        case 'gif':
            return true;
            break;
        
        default:
            return false;
            break;
    }
}

function isPdf($extension)
{
    switch ($extension) {
        case 'pdf':
            return true;
            break;
        
        default:
            return false;
            break;
    }
}

function file_extension($name)
{
    $n = strrpos($name, '.');
    return ($n === false) ? '' : substr($name, $n + 1);
}

function get_target_dir($name)
{
    $extension = file_extension($name);

    if (isImage($extension)) {
        return "uploads/image/";
    } elseif (isPdf($extension)) {
        return "uploads/pdf/";
    } else {
        return "uploads/other/";
    }
}

function is_logged()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return true;
    } else {
        return false;
    }
}

function get_logged_name()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['nombre'])) {
        return $_SESSION['nombre'];
    } else {
        return "Anónimo";
    }
}

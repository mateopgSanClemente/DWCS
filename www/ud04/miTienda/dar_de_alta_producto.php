<?php
require ("lib/base_datos.php");
require ("lib/utilidades.php");
contarVisitarCookie();
//VALIDAR CAMPOS
$nombreProducto="";
$descripcionProducto="";
$precioProducto=0;
$cantidadProducto=0;
$fotoProducto="";
$rutaDirectorioFotos="fotografias/";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"]) && count($_FILES["fileToUpload"]["name"])>0){
    /**
     * Convertir unidades y precio a float, utilizando la coma como separador
     */
    $nombreProducto=$_POST["nombre"];
    $descripcionProducto=$_POST["descripcion"];
    $precioProducto=$_POST["precio"];
    $cantidadProducto=$_POST["unidades"];
    //CREO QUE ESTA PARTE NO ES NECESARIA!
    $precioProducto = floatval($precioProducto);
    $cantidadProducto = floatval($cantidadProducto);
    $nombreFoto=$_FILES["fileToUpload"]["name"];
    $tamanhoFoto=$_FILES["fileToUpload"]["size"];
    $validarNombre;
    $validarDescripcion;
    $validarPrecio;
    $validarCantidad;
    $validarFoto=comprobarExtension($nombreFoto, $rutaDirectorioFotos);
    $validarTamanho=comprobarTamanho($tamanhoFoto);
    if(!empty($nombreProducto) && is_string($nombreProducto) && strlen($nombreProducto)<=50){
        $nombreProducto=test_input($nombreProducto);
        $validarNombre=true;
    }else{
        echo "El nombre introducido no es válido.";
        $validarNombre=false;
    }

    if(!empty($descripcionProducto) && is_string($descripcionProducto) && strlen($descripcionProducto)<=100){
        $descripcionProducto=test_input($descripcionProducto);
        $validarDescripcion=true;
    }else {
        echo "La descripción introducida no es válida.";
        $validarDescripcion=false;
    }

    if(!empty($precioProducto) && is_float($precioProducto)){
        //CREO QUE ESTA PARTE NO ES NECESARIA!
        $precioProducto=number_format($precioProducto, 2);
        $validarPrecio=true;
    }else{
        echo "El precio introducido no es válido.";
        $validarPrecio=false;
    }

    if(!empty($cantidadProducto) && is_float($cantidadProducto)){
        $validarCantidad=true;
    }else{
        echo "La cantidad introducida no es válida.";
        $validarCantidad=false;
    }
    //CORREGIR: Mostar el mensaje cuando alguna de las validaciones falla
    if(!$validarFoto && !$validarTamanho){
        echo"Es necesario subir un fichero con un formato válido.";
    }
    if ($validarNombre && $validarDescripcion && $validarPrecio && $validarCantidad && $validarFoto && $validarTamanho){
        $conPDO = get_conexion();
        seleccionar_bd_tienda($conPDO);
        insertar_datos_producto($conPDO, $nombreProducto, $descripcionProducto, $precioProducto, $cantidadProducto, $fotoProducto);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de alta productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <h1>Alta producto</h1>
    <form action="dar_de_alta_producto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre producto:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion"required>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" min="0" step="0.01" required>
        <label for="unidades">Unidades:</label>
        <input type="number" name="unidades" id="unidades" min="0" step="1" required>
        <label for="fileToUpload">Fotografía</label>
        <input type="file" name="fileToUpload[]" id="fileToUpload" value="Subir archivo" multiple>
        <input type="submit" name="submit" id="submit" value="Subir producto">
    </form>
</body>
</html>
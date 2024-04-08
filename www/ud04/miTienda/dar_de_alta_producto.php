<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de alta productos</title>
</head>
<body>
    <form action="dar_de_alta_producto.php" method="post">
        <label for="nombre">Nombre producto:</label>
        <input type="text" name="nombre" id="nombre">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" min="0">
        <label for="unidades">Unidades:</label>
        <input type="text" name="unidades" id="unidades" min="0">
        <label for="fileToUpload">Fotografía</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="submit" id="submit" value="Subir producto">
    </form>
</body>
</html>
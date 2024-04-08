<?php
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
    <form action="dar_de_alta_producto.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre producto:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion"required>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" min="0" step="0.01" required>
        <label for="unidades">Unidades:</label>
        <input type="number" name="unidades" id="unidades" min="0" required>
        <label for="fileToUpload">Fotografía</label>
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <input type="submit" name="submit" id="submit" value="Subir producto">
    </form>
</body>
</html>
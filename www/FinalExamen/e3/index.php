<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nota</title>
</head>
<body>
    <h2>Crear Nota</h2>
    <form action="guardar_nota.php" method="post">
        <label for="nombre">Nombre de la nota:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="contenido">Contenido de la nota:</label><br>
        <textarea id="contenido" name="contenido" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Guardar Nota">
    </form>

    <h2>Notas Guardadas</h2>

    <?php
    
    /*Mostrar las notas guardadas utilizando el formato:
        <div class="nota">
            <h3>Titulo de la nota</h3>
            <p>Contenido de la nota</p>
        </div>
        <div...>
    */
    ?>
    
</body>
</html>
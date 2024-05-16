<?php

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    // Directorio donde se guardarán las notas
    $directorio_notas = 'notas/';

    // Crear el archivo de la nota
    $archivo = fopen($directorio_notas . $nombre . ".txt", "w");

    // Escribir el contenido en el archivo
    fwrite($archivo, $contenido);

    // Cerrar el archivo
    fclose($archivo);

    echo "La nota se ha guardado correctamente en el archivo: $directorio_notas$nombre.txt";
} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}

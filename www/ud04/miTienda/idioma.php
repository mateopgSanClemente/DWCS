<?php
    require ("lib/utilidades.php");
    contarVisitarCookie();
    if(isset($_POST["submit"])){
        if($_POST["idioma"]=="es"){
            echo "<p>Bienvenido a mi página</p>";
        }elseif($_POST["idioma"]=="gal"){
            echo "<p>Benvido a miña páxina</p>";
        }elseif($_POST["idioma"]=="en"){
            echo "<p>Welcome to my page</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idioma</title>
</head>
<body>
    <h1>IDIOMA</h1>
    <p>Selecciona un idioma:</p>
    <form action="idioma.php" method="post">
        <select name="idioma" id="idioma">
            <option value="es">Español</option>
            <option value="gal">Gallego</option>
            <option value="en">Inglés</option>
        </select>
        <input type="submit"name="submit" id="submit" value="Seleccionar idioma">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>
</html>
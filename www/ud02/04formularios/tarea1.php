<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
            <form action="tarea1.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type ="text" id="nombre" name="nombre" required><br>
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required><br>
                <label for="nombreApellidos">Nombre y apellidos:</label>
                <input type="text" id="nombreApellidos" name="nombreApellidos" required>
                <input type="submit" value="Enviar">
            </form>
        </div>

            <div>
                <?php 
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    //Aquí el código php que muestra la información solicitada.
                    if(isset($_POST["nombre"])){
                        echo "<br>Nombre: " . $_POST["nombre"];
                    }
                    if (isset($_POST["apellidos"])){
                        echo "<br>Apellidos: " . $_POST["apellidos"];
                    }
                    if (isset($_POST["nombreApellidos"])){
                        echo"<br>Nombre y Apellidos: " . $_POST["nombreApellidos"];
                    }
                    if(strlen($_POST["nombre"]) == 1) {
                        echo "<br>Su nombre tiene " . strlen($_POST["nombre"]) . " caracter.";
                    } else {
                        echo "<br>Su nombre tiene " . strlen($_POST["nombre"]) . " caracteres.";
                    }
                    echo "<br>Los tres primeros caractes de tu nombre son: " . $_POST["nombre"][0] . $_POST["nombre"][1] . $_POST["nombre"][2] . "."; //Problema: Que pasa si el nombre tiene menos de 3 caracteres? Da error por que las posiciones señaladas dentro de la cadena no existen!
                    //Encontrar la posición de la letra 'A' dentro de la cadena 'apellidos'
                    if (isset($_POST["apellidos"])){
                        for ($i=0; $i < strlen($_POST["apellidos"]); $i++){
                            if ($_POST["apellidos"][$i] == "a" || $_POST["apellidos"][$i] == "A"){
                                echo "<br>La letra A fue encontrada en sus apellidos en la posición: " . $i+1 . ".";
                                break;
                            }
                        }
                    }
                    echo "<br>Tu nombre en mayusculas es: " . strtoupper($_POST["nombre"]) . ".";
                    echo "<br>Sus apellidos en minúsculas son: " . strtolower($_POST["apellidos"]) . ".";
                    echo "<br>Su nombre y apellidos en mayúsculas: " . strtoupper($_POST["nombreApellidos"]);
                    //Nombre escrito al revés
                    $nombreReves = "";
                    for($i=strlen($_POST["nombre"])-1; $i>=0; $i--){
                        $nombreReves = $nombreReves . $_POST["nombre"][$i];
                    }
                    echo "<br>Tu nombre escrito al revés es: " .$nombreReves . ".";
                ?>
        </div>
    </body>
</html>

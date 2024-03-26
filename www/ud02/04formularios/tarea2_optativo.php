<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->       
            <form action="tarea2_optativo.php" method="POST"> 
                <table style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Bebida</th>
                            <th>PVP</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="cocaCola">Coca Cola</label>
                                <input type="checkbox" name="checkbox[]" id="cocaCola" value="Coca Cola">
                            </td>
                            <td>1 €</td>
                            <td>
                                <input type="number" name="cantidadCola" id="cantidadCola" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pepsiCola">Pepsi Cola</label>
                                <input type="checkbox" name="checkbox[]" id="pepsiCola" value="Pepsi Cola">
                            </td>
                            <td>0,80 €</td>
                            <td>
                                <input type="number" name="cantidadPepsi" id="cantidadPepsi" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="fantaNaranaja">Fanta Naranaja</label>
                                <input type="checkbox" name="checkbox[]" id="fantaNaranja" value="Fanta Naranja">
                            </td>
                            <td>0,90 €</td>
                            <td>
                                <input type="number" name="cantidadFantaNaranja" id="cantidadFantaNaranja" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="trinaManzana">Trina Manzana</label>
                                <input type="checkbox" name="checkbox[]" id="trinaManzana" value="Trina Manzana">
                            </td>
                            <td>1,10 €</td>
                            <td>
                                <input type="number" name="cantidadTrinaManzana" id="cantidadTrinaManzana" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Solicitar" name="solicitar" id="solicitar">
            </form>
        </div>
        <?php 
    /*
    Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */
    //Aquí va el código PHP que muestra la información solicitada.
            $precioCola = 1;
            $precioPepsi = 0.80;
            $precioFantaNaranja = 0.90;
            $precioTrinaManzana = 1.10;
            if (!empty($_POST["checkbox"])){
                //En caso de seleccionar productos y no marcar la cantidad, genera un resultado incoherente.
                $cantidadCola = $_POST["cantidadCola"];
                $cantidadPepsi = $_POST["cantidadPepsi"];
                $cantidadFantaNaranja = $_POST["cantidadFantaNaranja"];
                $cantidadTrinaManzana = $_POST["cantidadTrinaManzana"];
                $resultado = "Pediste ";
                foreach ($_POST["checkbox"] as $valor){
                    if ($valor == "Coca Cola" && $cantidadCola != 0){
                        $resultado = $resultado . $cantidadCola . " " . $valor;
                    } else if ($valor == "Pepsi Cola" && $cantidadPepsi != 0){
                        $resultado = $resultado . $cantidadPepsi . " " . $valor;
                    } else if ($valor == "Fanta Naranja" && $cantidadFantaNaranja != 0){
                        $resultado = $resultado . $cantidadFantaNaranja . " " . $valor;
                    } else if ($valor == "Trina Manzana" && $cantidadTrinaManzana != 0){
                        $resultado = $resultado . $cantidadTrinaManzana . " " . $valor;
                    }
                    /*Aparecen tantas comas como elemento tenga el array 'checkbox', como puedo evitarlo?
                        POSIBLE SOLUCIÓN: Crear un array multidimensional que incorpore los productos seleccionados, la cantidad y sus precios.
                    */
                    $resultado = $resultado . ", ";
                    /*Como puedo conseguir que, en caso de seleccionar varios productos y estar en el último elemento, aparezca una 'y' entre el penúltimo y último elemento??
                        POSIBLE SOLUCIÓN: Usar apuntadores para recorrer el array
                    */
                }
                $resultado = $resultado . "precio total a pagar ";
                $precioTotal = $precioCola * $cantidadCola + $precioPepsi * $cantidadPepsi + $precioFantaNaranja * $cantidadFantaNaranja + $precioTrinaManzana * $cantidadTrinaManzana;
                $precioFormateado = number_format($precioTotal,2 , ",", ".") . "€";
                $resultado = $resultado . $precioFormateado . ".";
                echo "$resultado";
            }
        ?>
    </body>
</html>
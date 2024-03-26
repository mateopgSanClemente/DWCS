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
                                <input type="checkbox" name="cocaCola" id="cocaCola">
                            </td>
                            <td>1 €</td>
                            <td>
                                <input type="number" name="cantidadCola" id="cantidadCola" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pepsiCola">Pepsi Cola</label>
                                <input type="checkbox" name="pepsiCola" id="pepsiCola">
                            </td>
                            <td>0,80 €</td>
                            <td>
                                <input type="number" name="cantidadPepsi" id="cantidadPepsi" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="fantaNaranaja">Fanta Naranaja</label>
                                <input type="checkbox" name="fantaNaranja" id="fantaNaranja">
                            </td>
                            <td>0,90 €</td>
                            <td>
                                <input type="number" name="cantidadFantaNaranja" id="cantidadFantaNaranja" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="trinaManzana">Trina Manzana</label>
                                <input type="checkbox" name="trinaManzana" id="trinaManzana">
                            </td>
                            <td>1,10 €</td>
                            <td>
                                <input type="number" name="cantidadTrinaManzana" id="cantidadTrinaManzana" min="0" max="10" step="1" value="0">
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            
        ?>
    </body>
</html>
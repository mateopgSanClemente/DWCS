<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
            <form action="tarea2_optativo.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Bebida</th>
                            <th>PVP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Coca cola</td>
                            <td>1 €</td>
                        </tr>
                        <tr>
                            <td>Pepsi Cola</td>
                            <td>0,80 €</td>
                        </tr>
                        <tr>
                            <td>Fanta Naranja</td>
                            <td>0,90 €</td>
                        </tr>
                        <tr>
                            <td>Trina Manzana</td>
                            <td>1,10 €</td>
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
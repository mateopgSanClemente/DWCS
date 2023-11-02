<?php

/*Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.
*/
phpinfo();
//La dirección IP del servidor donde se está ejecutando actualmente el script.
echo $_SERVER["SERVER_ADDR"];
//El nombre del host del servidor donde se está ejecutando actualmente el script. Si el script se ejecuta en un host virtual se obtendrá el valor del nombre definido para dicho host virtual.
echo $_SERVER["SERVER_NAME"];
//Método de petición empleado para acceder a la página, por ejemplo 'GET', 'HEAD', 'POST', 'PUT'.
echo $_SERVER["REQUEST_METHOD"];

?>
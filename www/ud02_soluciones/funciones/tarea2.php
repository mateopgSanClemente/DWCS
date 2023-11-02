<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

 function comprobar_nif($dni) {
    $digitos_control = ['T','R','W', 'A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
    //el DNI se compone por 8 digitos + el dígito de control
    if(strlen($dni)==9) { 
        $dni_num = substr($dni,0, 8); 
        $dni_letra = substr($dni,8,9); 
        $letra = strtoupper($dni_letra); 

        $resto = $dni_num%23;
        $dni_letra==$digitos_control[$resto] ? $dni_valido = true : $dni_valido =false; 
        return $dni_valido;
    }
    else {
        echo 'Introduce un DNI válido'; 
    }
 }
 echo comprobar_nif('44849378G');
?>
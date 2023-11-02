<?php

/**
 * Indica cuál de los siguientes son nombres de variables válidas e inválidos, indica por qué (en comentarios) y corrige los fallos:
- valor 
- $_N
- $valor_actual 
- $n
- $#datos 
- $valorInicial0
- $proba,valor 
- $2saldo
- $n
- $meuProblema
- $meu Problema
- $echo
- $m&m
- $registro
- $ABC
- $85 Nome
- $AAAAAAAAA
- $nome_apelidos
- $saldoActual
- $92
- $*143idade
 */

 $valor; // valor - No empieza por el símbolo $ 
 $_N; // Correcto
 $valor_actual; // Correcto
 $n; // Correcto
 $datos; //$#datos - Error, los nombres de las variables no pueden contener carácteres especiales como el #
 $valorInicial0; // Correcto
 $probavalor; // $proba,valor - Error, no puede contener caracteres especiales, como una coma. 
 $saldo2; // $2saldo - Error, no puede empezar por numero
 $N;  //Correcta, aunque las mayúsculas las reservamos para las constantes.
 $meuProblema; //Correcto 
 $meu_Problema; // Error - Los nombres de las variables no pueden llevar espacio
 $echo; //Correcto, pero no es un nombre recomendable porque se puede confundir con una palabra reservada.
 $mym; //$m&m. Error -  no puede contener caracteres especiales, como un &. 
 $registro; //Correcto 
 $ABC;  //Correcta, aunque las mayúsculas las reservamos para las constantes.
 $_85_Nome; //$85 Nome. Error, las variables no pueden empezar por número ni llevar espacios
 $AAAAAAAAA;  //Correcta, aunque las mayúsculas las reservamos para las constantes.
 $nome_apelidos;  //Correcta. 
 $saldoActual; //Correcta, 
 $_92; //$92. Error -no puede empezar por número
 $_143idade; // $*143idade,  Error -no puede llevar caracteres especiales ni empezar por números

?>
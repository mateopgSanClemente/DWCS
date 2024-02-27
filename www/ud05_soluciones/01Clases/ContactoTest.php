<?php

require_once "Contacto.php";

use ud05\Contacto;

$contactoSabela = new Contacto("Sabela", "Sobrino", 670081458);
$contactoIvan = new Contacto("Ivan", "Gomez", 650971459);
$contactoAlberto = new Contacto("Alberto", "García", 673962456);

echo "Se muestran los valores del objeto 1: <br>\n";
echo $contactoSabela -> getNombre() . "<br>\n";
echo $contactoSabela -> getApellido() . "<br>\n";
echo $contactoSabela -> getNumTelefono() . "<br>\n";

$contactoSabela-> muestraInformacion();

echo "Se muestran los valores del objeto 2: <br>\n";
echo $contactoIvan -> getNombre() . "<br>\n";
echo $contactoIvan -> getApellido() . "<br>\n";
echo $contactoIvan -> getNumTelefono() . "<br>\n";

$contactoIvan-> muestraInformacion();

echo "Se muestran los valores del objeto 3: <br>\n";
echo $contactoAlberto -> getNombre() . "<br>\n";
echo $contactoAlberto -> getApellido() . "<br>\n";
echo $contactoAlberto -> getNumTelefono() . "<br>\n";
$contactoAlberto-> muestraInformacion();

<?php
require "Contacto.php";
$contacto1 = new Contacto("Mateo", "Pastor", 1);
$contacto2 = new Contacto("Daniel", "N", 2);
$contacto3 = new Contacto("Julia", "Lacleta", 3);

echo ("CONTACTOS:<br>\t-Nombre: ". $contacto1->getNombre() . "<br>\t-Apellidos: " . $contacto1->getApellido() . "<br>\t-Teléfono: " . $contacto1->getNumeroTelefono() .
"<br><br>\t-Nombre: " . $contacto2->getNombre() . "<br>\t-Apellidos: " . $contacto2->getApellido() . "<br>\t-Teléfono: " . $contacto2->getNumeroTelefono() .
"<br><br>\t-Nombre: " . $contacto3->getNombre() . "<br>\t-Apellidos: " . $contacto3->getApellido() . "<br>\t-Teléfono: " . $contacto3->getNumeroTelefono());

echo $contacto1->muestraInformacion();
echo $contacto2->muestraInformacion();
echo $contacto3->muestraInformacion();
?>
<?php

namespace ud05;

class Contacto
{
    // Atributos
    private $nombre;
    private $apellido;
    private $num_telefono;

    // Constructor
    public function __construct($nombre, $apellido, $num_telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->num_telefono = $num_telefono;
    }

    // Getters y Setters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNumTelefono()
    {
        return $this->num_telefono;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setNumTelefono($num_telefono)
    {
        $this->num_telefono = $num_telefono;
    }

    public function muestraInformacion()
    {
        echo "Nombre: " . $this->nombre . "<br>
         Apellido: " . $this->apellido . "<br>
         Número de teléfono: " . $this->num_telefono . "<br>\n";
    }

    public function __destruct()
    {
        echo "<p>Se destruye el objeto de nombre " . $this->nombre .
        ", apellido  " . $this->apellido .
        " y cuyo número de teléfono es " . $this->num_telefono .
        "</p>\n";
    }
}

<?php
class Contacto {
    private $nombre;
    private $apellido;
    private $numeroTelefono;

    public function __construct($nombre, $apellido, $numeroTelefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroTelefono = $numeroTelefono;
    }

    public function __destruct(){
        echo "<br>Se eliminó el contacto:<br>\t-Nombre: $this->nombre<br>\t-Apellido: $this->apellido<br>\t-Teléfono: $this->numeroTelefono";
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNumeroTelefono(){
        return $this->numeroTelefono;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setNumeroTelefono($numeroTelefono){
        $this->numeroTelefono = $numeroTelefono;
    }

    public function muestraInformacion(){
        echo "<br>CONTACTO:<br>\t-Nombre: $this->nombre<br>\t-Apellido: $this->apellido<br>\t-Numero teléfono: $this->numeroTelefono";
    }
}
?>
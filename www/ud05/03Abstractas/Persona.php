<?php
abstract  class Persona {
    private $id;
    protected $nombre;
    protected $apellidos;

    abstract public function __construct();
    abstract public function getId();
    abstract public function getNombre();
    abstract public function getApellidos();
    abstract public function setId();
    abstract public function setNombre();
    abstract public function setApellidos();
}
?>
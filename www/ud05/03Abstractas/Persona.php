<?php
abstract  class Persona {
    private string $id;
    protected string $nombre;
    protected string $apellidos;

    abstract public function __construct(int $id, string $nombre, string $apellidos);
    abstract public function getId();
    abstract public function getNombre();
    abstract public function getApellidos();
    abstract public function setId(int $idNumero);
    abstract public function setNombre(string $nombre);
    abstract public function setApellidos(string $apellidos);
}
?>
<?php
abstract  class Persona {
    private string $id;
    protected string $nombre;
    protected string $apellidos;

    abstract public function __construct(string $id, string $nombre, string $apellidos);
    abstract public function getId() : string;
    abstract public function getNombre() : string;
    abstract public function getApellidos() : string;
    abstract public function setId(int $idNumero);
    abstract public function setNombre(string $nombre);
    abstract public function setApellidos(string $apellidos);
    abstract public function action();
}
?>
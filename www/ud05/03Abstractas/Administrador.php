<?php
require_once "Persona.php";
class Administrador extends Persona{
    public function __construct(int $numeroId, string $nombre, string $apellidos){
        $letraId = 'a';
        $id = $letraId . $numeroId;
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function setId(int $numeroId){
        $letraId = 'u';
        $id = $letraId . $numeroId;
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellidos($apelldos){
        $this->apellidos = $apelldos;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function accion(){
        if($this->id[0] == 'a'){
            echo "<br>CARACTERÍSTICAS:
            <br>\t-ID: $this->id
            <br>\t-Nombre: $this->nombre
            <br>\t-Apellidos: $this->apellidos
            <br>\t-Rol: Administrador";
        }
    }
}
?>
<?php
require_once "Persona.php";
class Usuario extends Persona{
    public function __construct(int $numeroId, string $nombre, string $apellidos){
        $letraId = 'u';
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
        if($thid->id[0] == 'u'){
            echo "<br>CARACTERÍSTICAS:
            <br>\t-ID: $this->id
            <br>\t-Nombre: $this->nombre
            <br>\t-Apellidos: $this->apellidos
            <br>\t-Rol: Usuario";
        }
    }
}
?>
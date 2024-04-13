<?php
class Empleado {
    public $nombre;
    public $salario;
    public static $numEmpleado = 0;
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }
}
?>
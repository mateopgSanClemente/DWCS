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

    public function getSalario(){
        return $this->salario;
    }

    public function __construct($nombre, $salario){
        if($salario <= 20000){
            $this->nombre = $nombre;
            $this->salario = $salario;
            self::$numEmpleado++;
        } else {
            echo "El salario introducido no es válido.";
        }
    }
}
?>
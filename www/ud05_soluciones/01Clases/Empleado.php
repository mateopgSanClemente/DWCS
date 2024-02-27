<?php

namespace ud05;

class Empleado
{
    // Atributos

    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    // Métodos
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function __construct($nombre, $salario)
    {
        $this->nombre = $nombre;
        self::$numEmpleados++;

        if ($salario <= 2000) {
            $this->salario = $salario;
        } else {
            $this->salario = 2000;
        }
    }
    //3. Crea un método getSalario() que devuelva el salario del objecto que lo llame.
    public function getSalario()
    {
        return $this->salario;
    }
    public static function getNumEmpleados()
    {
        return self::$numEmpleados;
    }
}

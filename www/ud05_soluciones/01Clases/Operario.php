<?php

namespace ud05;

require_once "Empleado.php";

use ud05\Empleado;

class Operario extends Empleado
{

    private $turno;

    public function __construct($nombre, $salario, $turno)
    {
      
        parent::__construct($nombre, $salario);
        $this->setTurno($turno);
    }

    //Crear el setter para turno.  Los valores para esta variable sólo pueden ser "diurno" o "nocturno".
    public function setTurno($turno)
    {
        if (strtolower($turno) == strtolower("Diurno")) {
            $this->turno = "Diurno";
        } elseif (strtolower($turno) == strtolower("Nocturno")) {
            $this->turno = "Nocturno";
        } else {
            return false;
        }
    }
    public function getTurno()
    {
        return $this->turno;
    }
}

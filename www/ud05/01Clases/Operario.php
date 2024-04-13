<?php
class Operario extends Empleado {
    private $turno;
    
    public function __construct($nombre, $salario, $turno){
        parent::__construct($nombre, $salario);
        $this->setTurno($turno);
    }

    public function setTurno($turno){
        if($turno === "diurno" || $turno === "nocturno"){
            $this->turno = $turno;
        } else {
            echo "El valor introducido para el turno no es correcto, solo admite los valores 'diurno' o 'nocturno'.";
        }
    }
}
?>
<?php
    class Data {
        private static array $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        private static array $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        public static $calendario = "Calendario gregoriano";
        /*
        *  TODO: Modificar funcion
        */
        public static function getData(){
            $ano = date('Y');
            $mes = date('m');
            $dia = date('d');
            return $dia . '/' . $mes . '/' . $ano;
        }

        public static function getCalendar(){
            return self::$calendario;
        }

        public static function getHora(){
            return date('H:i:s');
        }
        /*
        *   TODO: Modificar el método para que este muestre elsiguiente mensaje:
            Hoy es $dia de $mese del $anho y son las $hora.
        */
        public static function getDataHora(){
            $fechaActual = self::getData();
            $ano = date('Y');
            $mes = self::$meses[date('n')-1];
            $dia = self::$dias[date('w')];
            $numeroDia = date('n');
            $hora = self::getHora();
            $mensaje = "Usamos el calendario: " . self::$calendario . "<br>";
            $mensaje .= "Hoy es $dia $numeroDia de $mes de $ano y son las $hora";
            echo $mensaje;
        }
    }
?>
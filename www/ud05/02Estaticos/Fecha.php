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
            return date('H:I:s');
        }
        /*
        *   TODO: Modificar el método para que este muestre elsiguiente mensaje:
            Hoy es $dia de $mese del $anho y son las $hora.
        */
        public static function getDataHora(){
            $fechaActual = self::getData();
            $diaSemana = date('l');
            $mes = date('F');
            $ano = date('Y');
            $hora = getHora();
            $mensaje = "Usamos el calendario: " . self::$calendario . "\n";
            $mensaje .= "Hoy es $diaSemana de $mes de $ano y son las $hora";
        }
    }
?>
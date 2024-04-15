<?php
    class Alien {
        private string $nombre;
        private static int $numberOfAliens=0;

        public function __construct(string $nombre){
            $this->nombre = $nombre;
            self::$numberOfAliens ++;
        }

        public function __destruct(){
            self::$numberOfAliens--;
        }

        public static function getNumberOfAliens(){
            return self::$numberOfAliens;
        }
    }
?>
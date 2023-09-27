<?php
    class Persona {
        private $nombre;
        private $apellido;
        private $edad;

        
        public function __construct(
            $nombre,
            $apellido,
            $edad=0
        ){
            $this->nombre= $nombre;
            $this->apellido = $apellido;
            $this->edad = $edad;
        }

        public function sayHello(){
            return sprintf(
                "Hola %s %s, bienvenido!!!",
                $this->nombre,
                $this->apellido
            );
        }

    }
?>
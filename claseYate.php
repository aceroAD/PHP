<?php
   require 'ClaseBarco.php';
   class Yate extends Barco {
       
       private static $ARR_CATEGORIAS = [0 => "PRIMERA" , 1 => "SEGUNDA", 2 => "TERCERA"];
       
       private $categoria;
       private $piscina;
       
       public function __construct($nombre, $matricula, $eslora, $peso, $numeroTripulantes, $numeroPasajeros, $categoria, $piscina) {
           parent::__construct($nombre, $matricula, $eslora, $peso, $numeroTripulantes, $numeroPasajeros);
           
           if (!$this->comprobarCategoria($categoria))
               throw new Error("No se encuentra esa categoria");
           elseif (!is_bool($piscina))
               throw new Error("Piscina tiene que ser booleano");
           else {
               $this->categoria = $categoria;
               $this->piscina = $piscina;
               
           }
           
       }
       
       private function comprobarCategoria($categoria) {
           for ($i = 0; $i < count(Yate::$ARR_CATEGORIAS); $i++)
           {
               if (strcasecmp($categoria, Yate::$ARR_CATEGORIAS[$i]) === 0)
                   return true;
           }
           return false;
       }
       
   }
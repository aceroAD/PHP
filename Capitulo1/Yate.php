<?php
require 'Barco.php';
require 'Alquilable.php';
class Yate extends Barco implements Alquilable{
    
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
                $this->categoria = strtolower($categoria);
                $this->piscina = $piscina;
            }       
    }
    
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getPiscina()
    {
        return $this->piscina;
    }
    
    public function setCategoria($categoria)
    {
        if (!$this->comprobarCategoria($categoria))
            throw new Error("No se encuentra esa categoria");
        $this->categoria = $categoria;
    }

    public function setPiscina($piscina)
    {
        if (!is_bool($piscina))
            throw new Error("Piscina tiene que ser booleano");
        $this->piscina = $piscina;
    }
    
    public function __toString() {
        $tienePiscina;
        if ($this->piscina) {
            $tienePiscina = "Si";
        }
        else $tienePiscina = "No";
        return parent::__toString() . " Categoria " . $this->categoria . " Tiene Piscina: " . $tienePiscina;
    }
    public function precioSinTripulacion()
    {
        $precio = parent::getEslora()*100;
        if ($this->getPiscina()) {
            $precio = $precio + 5000;
        }
        switch ($this->getCategoria())  {
            case "primera":
                $precio = $precio + 20000;
                break;
            case "segunda":
                $precio = $precio + 10000;
                break;
            case "tercera":
                $precio = $precio + 5000;
                break;
            }
         return $precio;
    }
    
    public function precioConTripulacion()
    {
        $precio = parent::getEslora()*100 + parent::getNumeroTripulantes() * 5000;
        
        if ($this->getPiscina()) {
            $precio = $precio + 5000;
        } 
        switch ($this->getCategoria())  {
                case "primera":
                    $precio = $precio + 20000;
                    break;
                case "segunda":
                    $precio = $precio + 10000;
                    break;
                case "tercera":
                    $precio = $precio + 5000;
                    break;
            }
            return $precio;
    }
    
    private function comprobarCategoria($categoria) {
        for ($i = 0; $i < count(Yate::$ARR_CATEGORIAS); $i++)
        {
            if (strcasecmp($categoria, Yate::$ARR_CATEGORIAS[$i]) === 0)
                return true;
        }
        return false;
    }
};

try {
    $yate = new Yate("nereida", "AA123", 4, 5, 3, 5, "Primera", true);
    
    echo $yate->__toString() . "<br>";
    echo $yate->precioConTripulacion() . "<br>";
    echo $yate->precioSinTripulacion();
}catch (Error $e) {
   echo $e->getMessage();
}
<?php
class Barco {
    private $nombre;
    private $matricula;
    private $eslora;
    private $peso;
    private $numeroTripulantes;
    private $numeroPasajeros;
    
    public function __construct($nombre, $matricula,$eslora, $peso, $numeroTripulantes,$numeroPasajeros) {
        if (!$this->comprobarMatricula($matricula))
            throw new Error("Matricula con formato distinto a AA123");
        elseif ($eslora <= 0)
            throw new Error("Tamaño de eslora menor que 0");
        elseif ($peso <= 0) 
            throw new Error("Peso imposible, 0 o menor");
        elseif ($numeroTripulantes <= 0)
            throw new Error ("Numero de tripulantes menor o igual que cero, imposible");
        elseif ($numeroPasajeros <= 0)
            throw new Error ("Numero de pasajeros menor o igual que cero, imposible");
        else {
            $this->nombre = $nombre;
            $this->matricula = $matricula;
            $this->eslora = $eslora;
            $this->peso = $peso;
            $this->numeroTripulantes = $numeroTripulantes;
            $this->numeroPasajeros = $numeroPasajeros;
        }
    }
    
    public function getName() {
        return $this->nombre;
    }
    
    public function getMatricula() {
        return $this->matricula;
    }
    
    public function getEslora() {
        return $this->eslora;
    }
    
    public function getPeso() {
        return $this->peso;
    }
    
    public function getNumeroTripulantes() {
        return $this->numeroTripulantes;
    }
    
    public function getNumeroPasajeros() {
        return $this->numeroPasajeros;
    }
    
    public function setName($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setMatricula($matricula) {
        if (!$this->conprobarMatricula())
            throw new Error("Matricula con formato distinto a AA123");
        else $this->matricula = $matricula;
    }
    
    public function setEslora($eslora) {
        if ($eslora <= 0)
            throw new Error("Tamaño de eslora menor que 0");
        else $this->eslora = $eslora;
    }
        
    public function setPeso($peso) {
        if ($peso <= 0)
            throw new Error("Peso imposible, 0 o menor");
        else $this->peso = $peso;
    }
    
    public function setNumeroTripulantes($numeroTripulantes) {
        if ($numeroTripulantes <= 0)
            throw new Error ("Numero de tripulantes menor o igual que cero, imposible");
        else $this->numeroTripulantes = $numeroTripulantes;
    }
    
    public function setNumeroPasajeros($numeroPasajeros) {
        if ($numeroPasajeros <= 0)
            throw new Error ("Numero de pasajeros menor o igual que cero, imposible");
        else $this->numeroPasajeros = $numeroPasajeros;
    }
    
    public function __toString() {
        return "Nombre " . $this->nombre . " Matricula " . $this->matricula . " Eslora " . $this->eslora . " Peso " . $this->peso . 
        " Numero de tripulantes " . $this->numeroTripulantes . " Numero de pasajeros " . $this->numeroPasajeros;
    }
    private function comprobarMatricula($matricula) {
        $formatoMat = "/[A-Z]{2}[0-9]{3}/";
        
        if (preg_match($formatoMat, $matricula))
            return true;
        else return false;
    }
};

try {
    $barco = new Barco("La nereida", "AA123", 5, 0, 7, 8);
    echo $barco->__toString();
} catch (Error $e) {
    echo $e->getMessage();
}




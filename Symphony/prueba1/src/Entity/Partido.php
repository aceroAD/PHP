<?php
use Doctrine\Common\Collections\ArrayCollections;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity @ORM\Table(name="partido")
**/

class Partido {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\ManyToOne(targetEntity="EquipoBidireccional")
     * @ORM\JoinColumn(name="local", referenceColumnName="id")**/
    private $local;
    /** @ORM\ManyToOne(targetEntity="EquipoBidireccional")
     * @ORM\JoinColumn(name="visistante", referenceColumnName="id")**/
    private $visitante;
    /** @ORM\Column(type="integer") **/
    private $golesLocal;
    /** @ORM\Column(type="integer") **/
    private $golesVisitante;
    /** @ORM\Column(type="date") **/
    private $fecha;
    
    public function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getLocal() {
        return $this->local;
    }
    
    public function getVisitante() {
        return $this->visitante;
    }
    
    public function getGolesLocal() {
        return $this->golesLocal;
    }
    
    public function getGolesVisistante() {
        return $this->golesVisitante;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
}
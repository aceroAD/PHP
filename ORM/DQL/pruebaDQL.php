<?php
    require_once "../bootstrap.php";
    require_once '../src/Jugador.php';
    require_once '../src/Equipo.php';
    
    $query = $entityManager->createQuery("SELECT j FROM jugador j where j.edad > 30");
    $jugadores = $query->getResult();
    
    foreach ($jugadores as $jugador) {
        echo "NOMBRE: " . $jugador->getNombre() ."<br>";
    }
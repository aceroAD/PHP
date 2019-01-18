<?php
    require_once "bootstrap.php";
    require_once './src/Equipo.php';
    $id = $_GET['id'];
    $equipos= $entityManager->getRepository('Equipo')->findBy(array('id'=>$id));
    foreach ($equipos as $equipo) {
        $nombreEquipo = $equipo->getNombre();
        echo  "Equipo con id " . $_GET['id']. ": " . $nombreEquipo;
    }
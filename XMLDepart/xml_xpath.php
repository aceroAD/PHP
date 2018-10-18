<?php
    $datos = simplexml_load_file("departamento.xml");
    $edades = $datos ->xpath("//edad");
    foreach ($edades as $edad) {
        print_r($edad);
        echo "<br>";
    }
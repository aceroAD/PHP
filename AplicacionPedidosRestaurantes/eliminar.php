<?php
    require_once 'sessions.php';
    comprobar_session();
    $cod = S_POST['cod'];
    $unidadesEliminar =(int) $_POST['unidades'];
    if(isset($_SESSION['carrito'][$cod]))
    {
        if($unidadesEliminar >= $_SESSION['carrito'][$cod])
            unset($_SESSION['carrito'][$cod]);
        else $_SESSION['carrito'][$cod] -= $unidadesEliminar;
    }
    header("Location: carrito.php");
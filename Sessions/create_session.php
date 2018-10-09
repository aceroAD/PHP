<?php
    if(!isset($_POST["usuario"]) || $_POST["usuario"] !== "user")
        header("Location:logIn.php?error=true");
    elseif (!isset($_POST["contraseña"]) || $_POST["contraseña"] !== "1234")
        header("Location:logIn.php?error=true");
        else  {
            session_start();
            $_SESSION["usuario"] = $_POST["usuario"];
            header("Location:bienvenido.php");
        }
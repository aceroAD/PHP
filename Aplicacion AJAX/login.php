<?php
 require "../cap4/bd.php";
 if(comprobar_usuario($_POST['correo'], $_POST['clave'])=== FALSE) {
     return false;
 }
 else {
     $usuario = comprobar_usuario($_POST['correo'], $_POST['clave']);
     session_start();
     $_SESSION["usuario"] = $usuario["correo"];
     $_SESSION["codRes"] = $usuario["codRes"];
     
     return true;
 }
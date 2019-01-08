<?php
 require "../cap4/bd.php";
 if(comprobar_usuario($_POST['correo'], $_POST['clave'])=== FALSE) {
     echo "false";
 }
 else {
     $usuario = comprobar_usuario($_POST['correo'], $_POST['clave']);
     session_start();
     $_SESSION["usuario"] = $usuario["correo"];
     $_SESSION["codRes"] = $usuario["codRes"];
     
     echo "true";
 }
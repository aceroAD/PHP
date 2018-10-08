<?php
$idioma = $_POST["idioma"];

setcookie("idioma", $idioma);
header("Location:bienvenido.php");
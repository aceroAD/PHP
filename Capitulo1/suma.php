<?php
 $numero1 = $_GET["numero1"];
 $numero2 = $_GET["numero2"];

if (empty($_GET["numero1"]) || empty($_GET["numero2"]))
    echo "error, no hay numeros que sumar";
elseif (!is_numeric($_GET["numero1"]) || !is_numeric($_GET["numero2"]))
    echo "error, no son numeros";
else echo ($numero1 + $numero2);
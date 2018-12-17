<?php
 require "../cap4/bd.php";
 $categorias = cargar_categorias();
 $array = iterator_to_array($categorias);
 $json = json_encode($array);
 echo $json;
<?php    
    require "../cap4/bd.php";
	$cats = cargar_categorias();
	$array = iterator_to_array($cats);
    $json = json_encode($array);   
    echo $json;
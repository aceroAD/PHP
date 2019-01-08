<?php  
    require_once '..\cap4\bd.php'; 
    $productos = cargar_productos_categoria($_GET['categoria']);             
    $cat_json = json_encode(iterator_to_array($productos));    
    echo $cat_json;
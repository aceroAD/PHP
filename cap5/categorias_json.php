<?php
	require (dirname(__FILE__).'\..\cap4\bd.php');
	$categorias = cargar_categorias();
	$cat_array = iterator_to_array($categorias);
	
	$cat_json = json_encode($cat_array);	
	echo $cat_json;
?>
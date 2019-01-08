<?php
	require '..\pedidos\bd.php';
	$categorias = cargar_categorias();
	$cat_array = [];
	
	/*metemos las filas del cursor en un array*/
	while($categoria = $categorias->fetch_assoc()){
		//si se quiere añadir un campo,
		// $url....
		//$categoria['link']  = $url
		
		$cat_array[]= $categoria;
	}
	
	$cat_json = json_encode($cat_array);	
	echo $cat_json;
?>
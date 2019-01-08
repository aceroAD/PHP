<?php
	require (dirname(__FILE__).'\..\cap4\bd.php');
	$salida = new SimpleXMLElement('<categorias/>');
	
	$categorias = cargar_categorias();
	$cat_array = iterator_to_array($categorias);
	foreach($cat_array as $cat){		
		$categoria = $salida->addChild('categoria');
		$categoria->addChild( "codCat", $cat["codCat"]);	
		$categoria->addChild( "nombre", $cat["nombre"]);			
	}
	print_r($cat_array);	
	echo $salida->asXML();
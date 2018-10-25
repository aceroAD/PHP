<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require_once 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Lista de productos por categoría</title>
		<script>
			function cambiarHref(texto){
				var enlace = texto.nextSibling.href;
				var cantidad = texto.value;
				//alert(cantidad);
				//alert(enlace);				
				//hay que buscar el ultimo = en href
				var posIgual = enlace.lastIndexOf('=');
				//alert(posIgual);
				/*recortamos la cadena hasta el igual*/
				var cadenaSin = enlace.substr(0, posIgual + 1);				
				/*añadimos la cantidad*/
				cadenaSin = cadenaSin + cantidad;
				texto.nextSibling.href = cadenaSin;
			}
		</script>
	</head>
	<body>
		<?php //require 'cabecera.php';
			//$cat = cargar_categoria($_GET['categoria']);
			$productos = cargar_productos_categoria($_GET['categoria']);
			/*if($cat=== FALSE or $productos === FALSE){
				echo "<p class='error'>Error al conectar con la base datos</p>";
				exit;
			}*/
			//echo "<h1>". $cat['nombre']. "</h1>";
			//echo "<p>". $cat['descripcion']."</p>";
			
			echo "<table>"; //abrir la tabla
			echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Stock</th><th>Comprar</th></tr>";
			foreach($productos as $producto){
				$nom = $producto['Nombre'];
				$des = $producto['Descripcion'];
				$peso = $producto['Peso'];
				$stock = $producto['Stock'];				
				
				$url = "anadir.php?cod=".$producto['CodProd']."&unidades=1";
				//print_r($producto);				
				echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$stock</td>
							<td><input type='number' min = '1' value = '1' onchange='cambiarHref(this)'><a href='$url'>Comprar</a></td> </tr>";
	
			}
			echo "</table>"
			
		?>
		
		
		
	</body>
</html>
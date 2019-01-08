<!DOCTYPE html>
<html>
	<head>
		<title>Tabla de categorías</title>		
		<meta charset = "UTF-8">
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {						
						$dept = new DOMDocument();
						$dept->load( this.responseText);
						// cargar la transformacion
						$transformacion = new DOMDocument();
						$transformacion->load( 'lista_categorias.xslt' );
						// crear el procesador
						$procesador = new XSLTProcessor();
						// asociar el procesador y la transformacion
						$procesador-> importStylesheet($transformacion) ;
						// transformar
						$transformada = $procesador->transformToXml($dept);
						echo $transformada;						
						var tabla = document.getElementById("lista");
						tabla.innerHTML = $transformada;
					}
				};
				xhttp.open("GET", "categorias_xml.php", true);
				xhttp.send();
				return false;
			}
			setInterval(loadDoc, 5000);
		</script>
	</head>
	
	<body>
		<h1>Categorías</h1>
		<table id = "lista">
		</table>
		
		
	</body>
	
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista de categorías</title>		
		<meta charset = "UTF-8">
		<script>
			function cargarCategorias() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var filas =  JSON.parse(this.responseText);
						var lista = document.getElementById("lista");
						lista.innerHTML = "";
						for(var i = 0; i < filas.length; i++){							
							var elem = document.createElement("li");
							var vinculo = document.createElement("a");
							vinculo.innerHTML = filas[i].nombre;							
							vinculo.href = "productos.php?codCat=" 
								+ filas[i].codCat;							
							elem.appendChild(vinculo);							
							lista.appendChild(elem);
						}
						
					}
				};
				xhttp.open("GET", "datos_categorias_json_bd.php", true);
				xhttp.send();
				return false;
			}
			cargarCategorias();
		</script>
	</head>
	
	<body>
		<h1>Categorías</h1>
		<ul id = "lista">
		</ul>
		<a href ="" onclick = "return loadDoc();">Recargar</a>
		
		
	</body>
	
</html>
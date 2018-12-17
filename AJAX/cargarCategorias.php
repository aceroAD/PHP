<!DOCTYPE html>
<html>
	<head>
    	<script>
    		function cargarCategorias() {
    			var xhttp = new XMLHttpRequest();
    			xhttp.onreadystatechange = function() {
    				if(this.readyState == 4 && this.status == 200) {
    					var filas = JSON.parse(this.responseText);
    				
    					var lista = document.getElementById("lista");
    					lista.innerHTML= "";
    					for (var i = 0; i< filas.length; i++) {
    						var elemento = document.createElement("li");
    						var vinculo = document.createElement("a");
    						vinculo.innerHTML = filas[i].nombre;
    						vinculo.href = "cargarProductos.php?CodCat=" + filas[i].codCat;
    						elemento.appendChild(vinculo);
    						lista.appendChild(elemento);
    					}
    				}		
    			};
    			xhttp.open("GET","datos_categorias.php", true);
    			xhttp.send();
    			return false;		
    		}
    		cargarCategorias();
    	</script>
	</head>
	<body>
		<h1>Categorias</h1>
		<ul id="lista">
		</ul>
	</body>
</html>
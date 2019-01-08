<!DOCTYPE html>
<html>
	<head>
		<title>Lista de categorías</title>		
		<meta charset = "UTF-8">
		<script>
		function crearTablaProductos(productos){ 
			var tabla = document.createElement("table"); 
			var cabecera =  document.createElement("tr"); 
			cabecera.innerHTML = "<th>Código</th><th>Nombre</th><th>Nombre</th><th>Nombre</th>";
			tabla.appendChild(cabecera); 	
			for(var i = 0; i < productos.length; i++){  			
				fila = document.createElement("tr"); 
				fila.innerHTML = "<td>"+productos[i]['CodProd']+"</td><td>"+productos[i]['Nombre']+"</td><td>"+productos[i]['Descripcion']+"</td><td>"+productos[i]['Stock']+"</td>";
			    tabla.appendChild(fila);         
			}
			return tabla;
		}			

    
		function cargarProductos(destino){
			var xhttp = new XMLHttpRequest();    
			xhttp.onreadystatechange = function() { 
				if (this.readyState == 4 && this.status == 200) {            
				var prod = document.getElementById("contenido"); 			
				var filas =  JSON.parse(this.responseText);  
				var tabla = crearTablaProductos(filas);              
				prod.innerHTML = ""; 
				prod.appendChild(tabla);                                              		
				}                 
			}; 
			xhttp.open("GET", destino, true); 
			xhttp.send(); 
			return false;
		}
			function cargarCategorias() {
				
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var filas =  JSON.parse(this.responseText);
						var seccion = document.getElementById("contenido");
						var lista = document.createElement("li");
						for(var i = 0; i < filas.length; i++){							
							var elem = document.createElement("li");
							var vinculo = document.createElement("a");
							vinculo.innerHTML = filas[i].nombre;							
							vinculo.href = "productos1.php?categoria=" 
								+ filas[i].codCat;	
							vinculo.onclick =function(){return cargarProductos(this);}	
							elem.appendChild(vinculo);							
							lista.appendChild(elem);
						}
						seccion.innerHTML = "";
						seccion.appendChild(lista);
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
		<section id = "contenido">
		
		</section>
		<a href ="#" onclick = "return cargarCategorias();">Recargar</a>
		
		
	</body>
	
</html>
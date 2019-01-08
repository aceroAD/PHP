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
						var filas =  JSON.parse(this.responseText);
						var tabla = document.getElementById("tabla");
						tabla.innerHTML = "";
						for(var i = 0; i < filas.length; i++){
							//tabla.innerHTML += "<tr><td>"+filas[i].cod+"</td><td>" +filas[i].nombre+"</td></tr>"
							nueva = document.createElement("tr");
							celdacod = document.createElement("td");
							celdacod.innerHTML = filas[i].cod;							
							celdanom = document.createElement("td");
							celdanom.innerHTML = filas[i].nombre;							
							nueva.appendChild(celdacod);
							nueva.appendChild(celdanom);
							tabla.appendChild(nueva);
						}
						
					}
				};
				xhttp.open("GET", "datos_categorias_json.php", true);
				xhttp.send();
				return false;
			}
			setInterval(loadDoc, 5000);
		</script>
	</head>
	
	<body>
		<h1>Categorías</h1>
		<table id = "tabla">
		</table>
		
		
	</body>
	
</html>
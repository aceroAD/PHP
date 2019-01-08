<!DOCTYPE html>
<html>
	<head>
		<title>Compra de entradas</title>		
		<meta charset = "UTF-8">
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("numEntradas").innerHTML =
							"Entradas disponibles:" + this.responseText;
					}
				};
				xhttp.open("GET", "entradas_aleatorio.php", true);
				xhttp.send();
				return false;
			}
		</script>
	</head>
	
	<body>
		<h1>Película 1</h1>
		<section id="numEntradas">Entradas disponibles:</section>
		<a href="#" onclick = "loadDoc()">Actualizar</a>
		
	</body>
	
</html>
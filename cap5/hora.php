<!DOCTYPE html>
<html>
	<head>
		<title>Hora en el servidor</title>		
		<meta charset = "UTF-8">
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("hora").innerHTML =
							"Hora en el servidor:" + this.responseText;
					}
				};
				xhttp.open("GET", "hora_servidor.php", true);
				xhttp.send();
				return false;
			}
			loadDoc();
			
		</script>
	</head>
	
	<body>
		<h1>Hora en el servidor</h1>
		<section id="hora"></section>
		<a href="#" onclick = " return loadDoc()">Actualizar</a>
				

		
	</body>
	
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Hora en el servidor</title>		
		<meta charset = "UTF-8">
		<script>
			function loadDoc() {
				open("GET", "hora_servidor.php", false);
				var resp = xhttp.send();
				document.getElementById("hora").innerHTML =
				"Hora en el servidor:" + resp.responseText;
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
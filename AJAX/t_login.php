<!DOCTYPE html>
<html>
	<head>
		<title>Formulario Inicio</title>
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
				 xhttp.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200) {
						var estadoUsuario = this.responseText;
						if(estadoUsuario === "TRUE")
							alert("Usuario Correcto");
						else alert("Usuario Incorrecto"); 
				 	}
				 };
				 var nombre = document.getElementById("nombre").value;
				 var pass = document.getElementById("pass").value;

				 xhttp.open("POST", "comprobacion.php",true);
				 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				 xhttp.send("nombre=" + nombre + "&pass=" + pass);
				 return false;
			}
			
		</script>
	</head>
	<body>
		<form onsubmit="return loadDoc()" action="">
			<input id="nombre" placeholder="nombre">
			<br>
			<input id ="pass" placeholder="password">
			<br>
			<input type="submit">
		</form>
	
	</body>

</html>
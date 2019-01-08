<!DOCTYPE html>
<html>
	<head>
	<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
				 xhttp.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200) {
						var estadoUsuario = this.responseText;
						if(estadoUsuario === "TRUE"){
							var login = document.getElementById("login");
							login.style.display="none";

							var principal = document.getElementById("principal");
							principal.innerHTML = <h1>Bienvenido</h1>;
						}
						else alert("usuario incorrecto");
							 
				 	}
				 };
				 var correo = document.getElementById("correo").value;
				 var clave = document.getElementById("clave").value;

				 xhttp.open("POST", "login.php",true);
				 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				 xhttp.send("correo=" + correo + "&clave=" + clave);
				 return false;
			}
			
		</script>
	</head>
	<body>
		<div id="login">
			<form>
				<input id="correo" placeholder="Usuario">
				<input id="clave" placeholder = "contraseña">
			</form>
		</div>
		<div id = "principal">
		
		</div>
	</body>
</html>
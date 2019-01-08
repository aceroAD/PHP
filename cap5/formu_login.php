<!DOCTYPE html>
<html>
	<head>
		<title>Lista de categorías</title>		
		<meta charset = "UTF-8">
		<script>
		function login(){       
			var xhttp = new XMLHttpRequest();                
			xhttp.onreadystatechange = function() { 
				if (this.readyState == 4 && this.status == 200) { 
					if(this.responseText==="FALSE"){ 
						alert("Revise usuario y contraseña"); 
					}else{ 
						alert("Datos correctos");
					}

				} 
			} 		 
			var usuario = document.getElementById("usuario").value; 
			var clave = document.getElementById("clave").value;  
			var params = "usuario="+usuario+"&clave="+clave; 
			xhttp.open("POST", "login_json.php", true);      
			//envío con  POST requiere cabecera y cadena de parámetros 
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
			xhttp.send(params);              
			return false;
			} 
			
		</script>
		<form onsubmit = "return login();">
			<input id = "usuario">
			<input id = "clave">
			<input type = "submit">
		</form>
	</head>
 
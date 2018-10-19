<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {
     $XML_conexion = new DOMDocument();
     $XML_conexion->load("BDconfig.xml");
     
     $xpath = new DOMXPath($XML_conexion);
     
     if($XML_conexion->schemaValidate("BDconfig.xsd")){
         
         $usuario_login = $_POST["usuario"];
         $pass_login = $_POST["pass"];
         
         $ip = $xpath->evaluate("/basedatos/ip");
         $nombre = $xpath->evaluate("/basedatos/nombre");
         $usuario = $xpath->evaluate("/basedatos/usuario");
         $pass = $xpath->evaluate("/basedatos/clave");
         
         $cadena_conex = "mysql:dbname=" . $nombre[0]->nodeValue . ";host=" . $ip[0]->nodeValue;
         
         $base_datos = new PDO($cadena_conex, $usuario[0]->nodeValue, $pass[0]->nodeValue);
         
         $select_usuario = "select * from empleados where nombre=$usuario and clave=$pass_login";
         $resultado = $base_datos->query($select_usuario);
         
         if($resultado) {
             $rol = $resultado["rol"];
             
             header("./departamentos.php?nombre=$nombre_login&rol=$rol");
         }
         
         else $error_conex = "Usuario no encontrado";
         
     }
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
	</head>
	<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
		<label>Usuario</label>
		<input name="usuario" type="text">
		<br>
		<label>Contraseña</label>
		<input name="pass" type="password">
		<br>
		<input type="submit">
	</form>
	<br>
	<?php if(isset($error_conex)){
	    echo "<p> $error_conex </p>";
	}?>
	
	</body>
</html>
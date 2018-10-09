<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenido</title>
	</head>
	<body>
		<h2>Bienvenido <?php echo $_SESSION["usuario"] . " ";?>a nuestra web.</h2>
		<form action="close_session.php" method="post">
			<input type="submit" value="Cerrar Sesion">
		</form>
	</body>
</html>
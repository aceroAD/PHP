<?php 
    $error = "";
    if(isset($_GET["error"]) and $_GET["error"])
        $error = "fallo en autentication";
    else $error = "";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
	</head>
	<body>
	<div style="color: red;"><?php echo $error?></div>
		<form action="create_session.php" method="post">
			<label>Usuario:</label>
			<input type="text" name="usuario">
			<br>
			<label>Contraseña:</label>
			<input type="password" name= "contraseña">
			<br>
			<input type="submit">
		</form>
	</body>
</html>
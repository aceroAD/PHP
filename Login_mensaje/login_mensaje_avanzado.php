<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['usuario'] === "usuario" && $_POST['password'] === "000") {
        header("Location:bienvenido.php");
    }
    else {
        $validacion = false;
        $usuario = $_POST['usuario'];
    }
}
else $usuario="";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pruebas formularios</title>
	</head>
	<body>
		<?php 
		if(isset($validacion) && $validacion == false)
		     echo '<p style="font:red">Usuario y contraseña erroneo</p>';
		?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="POST">
			<label>Usuario</label>
			<input name ="usuario" type="text" value = "<?php echo htmlspecialchars($usuario) ?>"/>
			<label>Contraseña</label>
			<input name="password" type="password"/>
			<input type="submit">
		</form>
	</body>
</html>

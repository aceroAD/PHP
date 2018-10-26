<?php
 require bbdd.php;
 session_start();
 
 if ($_SERVER('REQUEST_METHOD') == 'POST') {
    if (!comprobarUsuario($_POST["user"], $_POST["pass"]))
        $error = "Usuario no existe. Prueba otra vez";
        else {
            $_SESSION['user']['correo'] = $_POST['user'];
            $_SESSION['user']['carrito'] = [];
            header("Location:categorias.php");
        }
}
?>

<!DOCTYPE html>

<html>
    <head>
    	<meta charset = "UTF-8">
        <title>Log in.</title>
    </head>
    <body>
    	<?php if(isset($error))
    	    echo "<div style='color:red'> $error </div><br>";
    	    ?>
    	<form action= "<?php echo htmlspecialchars($_SERVER("PHP_SELF"))?>" method="POST">
    	 <label>User:</label>
    	 <input name = "user" type="text"/>
    	 <br>
    	 <label>Password:</label>
    	 <input name = "pass" type="password"/>
    	 <br>
    	 <input type="submit">
    	</form>
    </body>
</html> 
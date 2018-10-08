<?php 
    require 'funcionesValidacion.php';
    $error_alias="";
    $error_pass ="";
    $error_email="";
    $error_edad="";
    $error_avatar="";
    
    $alias="";
    $email="";
    $edad="";
    
    
    if($_SERVER["REQUEST_METHOD"]== "POST") {
        
        $alias=$_POST["Alias"];
        $email=$_POST["Email"];
        $edad = $_POST["Edad"];
        
        if(empty($_POST["Alias"]))
            $error_alias="Alias no puede estar vacio";
        elseif(strlen($_POST["Alias"]) < 6 || !comprobarAlias($_POST["Alias"]))
            $error_alias="No valido";
        else $nombre_valido=true;
        
        if(empty($_POST["Email"]))
            $error_email="Email no puede estar vacio";
        elseif(!comprobarEmail($_POST["Email"]))
            $error_email="No valido";
        else $email_valido=TRUE;
        
        if (empty($_POST["Contraseña"]))
            $error_pass = "Contraseña no puede estar vacia";
        elseif(!comprobarPass($_POST["Contraseña"]))
            $error_pass="No valido";
        elseif($_POST["Contraseña"] !== $_POST["Repeticion"])
            $error_pass = "Deben coincidir ambas";
        else $pass_valido = true;
        
        if (!comprobarEdad($_POST["Edad"]))
            $error_edad = "Edad incorrecta, debe estar entre 18 y 150";
        else $edad_valida = true;
        
        if (!comprobarAvatar($_FILES["Avatar"]["name"]) && $_FILES["Avatar"]["size"] > 256*1024)
            $error_avatar="Formato de imagen tiene que ser JPG o PNG";
            else  {
                $infoFile = [$nombre, $extension] = explode(".", $_FILES["Avatar"]["name"]);
                move_uploaded_file($_FILES["Avatar"]["tmp_name"], "./avatares/" . $_POST['Alias'] . "." .$infoFile[1]);
                $avatar_valido=true;
            }
        
        if($nombre_valido and $email_valido && $pass_valido && $edad_valida && $avatar_valido)
            header("Location:bienvenido.php");
    }
        
   
    
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Formulario alta usuario</title>
	</head>
	<body>
		<h1>Formulario alta</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
			<label>Alias: </label>
			<input name = "Alias" type="text" value="<?php echo $alias; ?>" required /> <span style="color:red;"><?php echo "$error_alias"?></span>
			<br>
			<label>Email: </label>
			<input name="Email" type="email" value="<?php echo $email; ?>" required/> <span style="color:red;"><?php echo "$error_email"?></span>
			<br>
			<label>Contraseña: </label>
			<input name ="Contraseña" type = "password" required/>
			<label>Repetir Contraseña: </label>
			<input name="Repeticion" type="password"/> <span style="color:red;"><?php echo "$error_pass"?></span>
			<br>
			<label>Edad: </label>
			<input name="Edad" type="text" value="<?php echo $edad; ?>"/> <span style="color:red;"><?php echo "$error_edad"?></span>
			<br>
			<label>Sexo</label>
			<input type="radio" name="sexo" value="Hombre" checked>Hombre<br>
			<input type="radio" name="sexo" value="Mujer"> Mujer <br>
			<input type="radio" name="sexo" value="Helicoptero de Combate"> Helicoptero de Combate <br>
			<input type="radio" name="sexo" value="Otro" > Otro <br>
			<br>
			<label>Avatar: </label>
			<input name="Avatar" type="file" ><span style="color:red;"><?php echo "$error_avatar"?></span>
			<br>
			<input type="submit" />
		</form>
	</body>
</html>
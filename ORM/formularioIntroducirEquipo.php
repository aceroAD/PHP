<?php 
    require_once "bootstrap.php";
    require_once './src/Equipo.php';
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $nuevo = new Equipo();
        $nuevo->setNombre($_POST['name']);
        $nuevo->setFundacion((int)$_POST['fundacion']);
        $nuevo->setSocios((int)$_POST['socios']);
        $nuevo->setCiudad($_POST['ciudad']);
        $entityManager->persist($nuevo);
        $entityManager->flush();
        echo "Equipo insertado " . $nuevo->getId() . "\n";
    }

?>

<!DOCTYPE html>
<head>
	<title>Formulario introduccion equipos</title>
</head>
<body>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "post">
		<input name="name" type="text" placeholder="Name" required>
		<br>
		<input name="fundacion" type="number" placeholder="Año fundacion">
		<br>
		<input name="socios" type="number" placeholder="Numero de Socios">
		<br>
		<input name="ciudad" type="text" placeholder="Ciudad del Equipo">
		<input type="submit">
</body>
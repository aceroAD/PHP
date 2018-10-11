<table>
<?php
$cod_dept = $_GET['cod_dept'];
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$pwd = '';

    $bd = new PDO($cadena_conexion, $usuario, $pwd);
	echo "ConexiÃ³n realizada con Ã©xito<br>";		
	$sql = "SELECT * FROM empleados where departamento = $cod_dept";
	$empleados = $bd->query($sql);
	//echo "Departamento : " . $usuarios->rowCount() . "<br>";	
	foreach ($empleados as $emple) {
		echo "<tr><td>".$emple['Nombre']."</td><td>".$emple['Apellidos']."</td></tr>";
	}	

?>	
</table>

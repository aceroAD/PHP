<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // comprobaciones

    $cadena_conexion = "mysql:dbname=Empresa;host=127.0.0.1";
    $user="diego";
    $pwd ="diego123";
    
    $nombre=$_POST["name"];
    $surname = $_POST["surname"];
    $salary = $_POST["salary"];
    $department = $_POST["departamento"];
    
    $base_datos = new PDO($cadena_conexion,$user,$pwd);
    
    $insert = "insert into empleados(nombre,apellidos,salario,departamento)
               values('$nombre', '$surname',$salary,$department) ";
    
    $resul = $base_datos->query($insert);
    
    if($resul) {
        echo "Consulta realizada con exito <br>";
        echo "Filas insertadas: " . $resul->rowCount() . "<br>";
        echo "Codigo de la fila insertada: " . $base_datos->lastInsertId(). "<br>";
        $base_datos->commit();
    }
    else {
        $error = $base_datos->errorInfo();
        print_r($base_datos->errorInfo()) ;
        if($error[0] ==23000) {
            echo "departamento no existe";
        }
    }
        
}
?>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
	<label>Name: </label>
	<input type="text" name="name">
	<br>
	<label>Surname: </label>
	<input type="text" name = "surname">
	<br>
	<label>Salary: </label>
	<input type="text" name="salary">
	<br>
	<label>Department: </label>
	<select name="departamento">
	<?php 
    	$cadena_conexion = "mysql:dbname=Empresa;host=127.0.0.1";
    	$user="diego";
    	$pwd ="diego123";
        $base_datos = new PDO($cadena_conexion,$user,$pwd);
        
        $select = "select * from departamentos";
        $resul = $base_datos->query($select);
        
        foreach ($resul as $departmento) {
            $value =$departmento["CodDept"];
            $nombre_dept = $departmento["Nombre"];
            echo "<option value=$value>" . $nombre_dept . "</option>";
        }
        
	?>
	</select>
</form>
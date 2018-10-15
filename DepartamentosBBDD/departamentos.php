<!DOCTYPE html>
<html>
    <STYLE type="text/css">
      table, th, td {
       border: 1px solid black;
       border-collapse: collapse;
       padding: 10px;
      }
    </STYLE>
	<body>
	
        <table>
        <?php
            $cadena_conexion = 'mysql:dbname=Empresa;host=127.0.0.1';
            $user = "diego";
            $pwd = "diego123";
            
            $bd = new PDO($cadena_conexion,$user,$pwd);
            $sql = "select nombre, codDept from departamentos";
            $departamentos = $bd ->query($sql);
            foreach ($departamentos as $depart){
                $codigo = $depart["codDept"];
                $url ="empleados_departamento.php?cod_depart=" . $codigo;
              
               echo "<tr><td><a href=$url>" . $depart["nombre"] . "</a></td><td>" . $depart["codDept"] . "</td></tr>";
            }
        ?>
        </table>
    </body>
</html>
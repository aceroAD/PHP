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
        $codigo_departamento = $_GET["cod_depart"];
       $cadena_conexion ="mysql:dbname=Empresa;host=127.0.0.1";
       $user = "diego";
       $pwd="diego123";
       
       $base_datos = new PDO($cadena_conexion, $user, $pwd);
       $sql = "select * from empleados where departamento =" . $codigo_departamento; 
       $empleados = $base_datos->query($sql);
       foreach ($empleados as $emple) {
           echo "<tr><td>".$emple['Nombre']."</td><td>".$emple['Apellidos']."</td></tr>";;
       }
    ?>
    </table>
</body>
</html>
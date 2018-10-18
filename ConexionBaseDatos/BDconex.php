<?php
 $DBconfig = new DOMDocument();
 $DBconfig->load("BDconfig.xml");
 
 $xpath = new DOMXPath($DBconfig);
 if ($DBconfig->schemaValidate("BDconfig.xsd")) {
     $ip = $xpath->evaluate("/basedatos/ip");
     $nombre = $xpath->evaluate("/basedatos/nombre");
     $usuario = $xpath->evaluate("/basedatos/usuario");
     $pass = $xpath->evaluate("/basedatos/clave");
     
  
     
     
     
     $cadena_conex = "mysql:dbname=" . $nombre[0]->nodeValue . ";host=" . $ip[0]->nodeValue;
     
     $base_datos=new PDO($cadena_conex,$usuario[0]->nodeValue,$pass[0]->nodeValue);
     $select_prueba = "select * from empleados";
     $resultado = $base_datos->query($select_prueba);
     
     if($resultado) {
         echo "conexion establecida";
     }
     else {
         echo "fallo conex";
     }
 }
 
 else echo "no es valido";
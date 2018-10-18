<?php
 $archivo = new DOMDocument();
 $archivo->load("departamento.xml");
 $resultado = $archivo ->schemaValidate("departamento.xsd");
 
 if ($resultado)
     echo "es valido";
 else echo "no es valido";
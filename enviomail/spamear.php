<?php
 require "enviocorreo.php";
 
 $emails = fopen("correos.txt", "r");
 $nombre = "";
 $correo = "";
 
 if($emails== false) {
     echo "error con fichero";
 }
 else
    while (!feof($emails)) {
         fscanf($emails,"%s , %s", $nombre, $correo);
         enviar_correo($correo, "buenas hijo puto, te destruyo $nombre");
     
    }
 
 fclose($emails);
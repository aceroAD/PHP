<?php 

require_once '..\cap4\bd.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
   

    $usu = comprobar_usuario($_POST['usuario'], $_POST['clave']); 

    if($usu===FALSE){ 

        echo "FALSE"; 

    }else{ 

        session_start(); 

        // $usu tiene campos correo y codRes, correo  

        $_SESSION['usuario'] = $usu; 

        $_SESSION['carrito'] = []; 

        echo "TRUE"; 

         

    }    

} 
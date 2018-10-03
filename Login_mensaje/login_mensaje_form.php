<?php

  if (isset($_GET["vaidacion"]) and $_GET["validacion"] == 1) {
    echo "Error en los datos, vuelva a introducir los datos";
  }
 
  echo '
       <html>
           <header>
               <meta title="formulario basico" />
          </header>
          <body>
               <form action= "procesarLog.php" method="POST">
                   <input name="usuario" type= "text" />
                   <input name = "password" type ="password" />
                   <input type = "submit" />
               </form>
          </body>
       </html> ';
    

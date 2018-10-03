<?php
    if($_POST['usuario'] === "diego" && $_POST['password'] === "123")
        header("Location:bienvenido.php");
    else header("Location:login_mensaje_form.php?validacion=1");
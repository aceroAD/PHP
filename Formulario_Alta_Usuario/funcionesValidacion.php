<?php
function comprobarAlias($alias) {
    $formatoAlias= "/^[a-zA-Z]+/";
    return preg_match($formatoAlias, $alias);
}

function comprobarEmail($email) {
    $formatoEmail = "/^[a-zA-Z0-9]+@[a-z]+\.[a-z]+$/";
    return preg_match($formatoEmail, $email);
}

function comprobarPass($pass) {
    
    if (strlen($pass) < 6 && strlen($pass) > 15)
        return false;
        elseif (!preg_match('/(?=[a-z])/', $pass))
        return false;
        elseif (!preg_match('/(?=[A-Z])/', $pass))
        return false;
        elseif (!preg_match('/(?=\d)/', $pass))
        return false;
        elseif (!preg_match("/(?=[!@%&]|_|-)/", $pass))
        return false;
        else return true;
        
}

function comprobarEdad($edad) {
    if ($edad < 18 || $edad > 150)
        return false;
        else return true;
}

function comprobarAvatar($avatar) {
    $formatoAvatar = ["/\.jpg$/", "/\.png$/"];
    if(!preg_match($formatoAvatar[0], $avatar) && !preg_match($formatoAvatar[1], $avatar))
        return false;
        else return true;
}
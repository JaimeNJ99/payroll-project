<?php

session_start();//inicia nueva sesion
$login = $_SESSION['login'];

if(!$login){
    header('Location: index.php');
}else{
    $username = $_SESSION['username']; //no es estrictamente necesario, pero nos facilitara el codigo más adelante
}
?>

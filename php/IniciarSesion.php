<?php

require("conexion.php");

session_start(); //inicia una nueva sesion o reanuda la existencia.
$_SESSION['login'] = false;

//declaracion de variables
$username = $_POST["username"];
$password = $_POST["contraseña"];
//Evaluamos el nickname ingresado
$consulta = "SELECT *
             FROM sesion
             WHERE Nombre_usuario = '$username'";
$consulta = mysqli_query($connection, $consulta);
$consulta = mysqli_fetch_array($consulta);

if($consulta){
    if($password == $consulta['Password']){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $consulta['Nombre_usuario'];
        $_SESSION['rol'] = $consulta['rol_id'];
        switch($_SESSION['rol']){
            case 1:
                header('Location: ../menu_admin.php');
            break;
            case 2:
                header('Location: ../menu_recepcionista.php');
            break;
            default:
        }   
    }else{
        echo "<script>alert('Contraseña incorrecta, por favor intente de nueva cuenta'); window.location = '../index.php';</script>";
    }
}else{
    echo "<script>alert('Usuario no existe, por favor intente de nueva cuenta'); window.location = '../index.php';</script>";
}

//Cerrando la conexion
mysqli_close($conexion);
?>

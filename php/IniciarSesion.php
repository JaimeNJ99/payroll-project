<?php

require("conexion.php");

session_start(); //inicia una nueva sesion o reanuda la existencia.
$_SESSION['login'] = false;

//prevent SQL injection
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["contraseña"]);

//Evaluamos el nickname ingresado
$consulta = "SELECT * FROM sesion WHERE Nombre_usuario = '$username'";
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
        header("Location: ../index.php?error=Incorrect username or password!");
        exit();
    }
}else{
    header("Location: ../index.php?error=Incorrect username or password!");
    exit();
}
?>

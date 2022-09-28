<?php
$servername = "localhost";
$username = "root";
$password = "hernandezj";
$database = "usuarioing";

//create connection
$connection = mysqli_connect($servername, $username, $password,$database);

//check connection
if(!$connection){
    die("Conexión failed".mysqli_connect_error());
}

?>
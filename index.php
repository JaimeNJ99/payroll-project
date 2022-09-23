<?php
  session_start();
  if(isset($_SESSION['rol'])){
    if( $_SESSION['rol'] == 1) header('Location: ./menu_admin.php');
    else if ($_SESSION['rol'] == 2 ) header('Location: ./menu_recepcionista.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | SBD</title>
  <!-- <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
  <!-- <link rel="stylesheet" href="/styles/style.css"> -->
  <link rel="stylesheet" href="/styles/main.css">
  <link rel="icon" href="img/hospital.png">
</head>
<body>
  <div>
    <form class="login-form" name="contacto" method="post" action="php/IniciarSesion.php">
      <h1>Login</h1>
      <div class="field">
        <label>Nombre de usuario</label>
        <input type="text" autocomplete="off" name="username" autofocus required>
      </div>
      <div class="field">
        <label>Contraseña</label>
        <input type="password" autocomplete="off" name="contraseña" required>
      </div>
      <div class="field">
        <button class="login-button" name="ingresar" >Login</button>
      </div>
    </form>
  </div>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
</body>
</html>
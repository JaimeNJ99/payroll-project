<?php
  session_start();
  if(isset($_SESSION['rol'])){
    if( $_SESSION['rol'] == 1) header('Location: ./menu_admin.php');
    else if ($_SESSION['rol'] == 2 ) header('Location: ./menu_recepcionista.php');
}
?>
<?php $title="Inicio | SBD"; include("includes/head.php") ?>
  <form class="login-form" name="contacto" method="post" action="php/IniciarSesion.php" onsubmit="return validation()" >

    <h1>Login</h1>

    <?php 
      if (isset($_GET['error'])){
        echo "<p class='error'>".$_GET['error']."</p>";
      }
    ?>

    <div class="field">
      <label>Nombre de usuario</label>
      <input id="username" type="text" autocomplete="off" name="username" autofocus required>
    </div>

    <div class="field">
      <label>Contraseña</label>
      <input id="password" type="password" autocomplete="off" name="contraseña" required>
    </div>

    <div class="field">
      <button class="login-button" name="ingresar" >Login</button>
    </div>
    
  </form>
<?php include("includes/footer.php") ?>
<?php
    require("php/conexion.php");
    require("php/validarSesion.php");
    //identifca la sesión activa
    if(!isset($_SESSION['rol'])){
        header('Location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('Location: index.php');
        }
    }
    //identifica si hay consulta por area
    $a = false;
    if(isset($_GET['area'])){
        $area = $_GET['area'];
        $a = true;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Administrador | SBD</title>
        <link rel="stylesheet" href="/styles/estilo.css">
        <link rel="icon" href="img/hospital.png">
        <!-- Muestra el elemento relacionado a la consulta -->
        <style>
            .styled-table tbody tr.active-row:hover {
    cursor: pointer;
    border-style: solid;
    border: 5px solid blue;  
}
input::placeholder {
  color:gray;
}

        </style>
    </head>
    <body>
    <div class="container">
    <div class="tutorial">
    <ul>
      <div style="font-size:40px; float: left; color: white;padding-top: 15px; margin-right: 15px;">Inicio administrador</div>
        <li><a id="a" href="php/cerrarSesion.php">Cerrar sesión </a></li>
      </ul>
      <div class="slider">
        <br>
        <h2>Nóminas - Empresa</h2>
        <br>
        <div style="margin: 0% 25%;">
            <div style="display: flex;">
                <div>
                    <p style="margin: 9px auto; padding: 5px;">Buscar por nombre</p>
                    <p style="margin: 9px auto; padding: 5px;">Buscar por area</p>
                    <p style="margin: 9px auto; padding: 5px;">Buscar por salario mayor a</p>
                    <p style="margin: 9px auto; padding: 5px;">Buscar por salario menor a</p>
                </div>
                <div style="width: -webkit-fill-available;">
                    <!-- Inputs de busqueda -->
                    <form action="Busqueda.php" method="GET">
                        <input class="input" type="text" autocomplete="off" name="nombre">
                        <input class="input" type="submit" name = "submit" class="green" value="->" style="width: 30px">
                        <br>
                    </form>
                    <form action="Busqueda.php" method="GET">
                        <!--<input class="input" type="text" autocomplete="off" name="area">-->
                        <select class="input" name="area">
                            <option value="marketing" selected>Marketing</option>
                            <option value="ventas">Ventas</option>
                        </select>
                        <input class="input" type="submit" name = "submit" class="green" value="->" style="width: 30px">
                    </form>
                    <form action="Busqueda.php" method="GET">
                        <input class="input" type="number" autocomplete="off" name="mayor">
                        <input class="input" type="submit" name = "submit" class="green" value="->" style="width: 30px">
                        <br>
                    </form>
                    <form action="Busqueda.php" method="GET">
                        <input class="input" type="number" autocomplete="off" name="menor">
                        <input class="input" type="submit" name = "submit" class="green" value="->" style="width: 30px">
                        <br>
                    </form>
                </div>
            </div>
            
            <br>
            <div style="text-align:center; display: flex; justify-content: center;">
                <!-- Botones de acciones --> 
                <div style="margin-left: 45px;">
                    <button id="btnadd" style="background: green;">
                        <span class='text'>Agregar empleado</span>
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                            </svg>
                        </span>
                    </button>
                </div>
                <div style="margin-left: 45px;">
                    <button id="btnlook" style="background: blue;">
                        <span class='text'>Ver lista completa de empleados</span>
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
                            </svg>
                        </span>
                    </button>
                </div> 
            </div>
            <!-- Agregar empleado (oculto hasta onClick) -->
            <div id="add" style="margin: 5% 25%; text-align: center; display:none; border-top: 5px solid #8ecbfe;">
                <?php require_once 'php/process.php'?>
                <form action="php/process.php" method="POST">
                    <h2>Agregar empleado<br></h2>
                    <input class="form" type="text" autocomplete="off" placeholder="Nombre del empleado" name="nombreADD" required><br>
                    <input class="form" type="text" autocomplete="off" placeholder="Area del empleado" name="areaADD" required><br>
                    <input class="form" type="text" autocomplete="off" placeholder="Sueldo del empleado" name="sueldoADD" required><br>
                    <button class="two" type="submit" name="save">Guardar datos</button>
                </form>
            </div>
            <!-- Ver lista completa de usuarios (oculto hasta onClick) -->
            <div id="look" style="text-align: center; display:none;">
                <div>
                    <table class="styled-table">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Trabajo</th>
                            <th>Sueldo</th>
                            <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //$con = mysqli_connect("localhost", "root", "", "usuarioing");
                                $query = "SELECT * FROM trabajadores";
                                $query_run = mysqli_query($connection, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $items){
                            ?>
                            <tr onclick="window.location='Busqueda.php?nombre=<?php echo $items['Nombre']; ?>'" class="active-row">
                            <td><?= $items['id']; ?></td>
                            <td><?= $items['Nombre']; ?></td>
                            <td><?= $items['Area']; ?></td>
                            <td><?= $items['Sueldo']; ?></td>
                            <td><?php if($items['Estatus'] = 1){
                                echo 'Activo';
                            }else{
                                echo 'Inactivo';
                            } 
                            ?></td>
                            </tr>
                            <?php
                                }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="information">
    </div>
</div>
<script>
    const targetDiv1 = document.getElementById("add");
    const targetDiv2 = document.getElementById("look");
    
    const btn1 = document.getElementById("btnadd");
    const btn2 = document.getElementById("btnlook");

    btn1.onclick = function () {
        if (targetDiv1.style.display !== "block") {
            targetDiv1.style.display = "block";
            targetDiv2.style.display = "none";
        }else{
            targetDiv1.style.display = "none";
        }
    };
    btn2.onclick = function () {
        if (targetDiv2.style.display !== "block") {
            targetDiv2.style.display = "block";
            targetDiv1.style.display = "none";
        }else{
            targetDiv2.style.display = "none";
        }
    };
</script>
    </div><link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- partial -->
    </body>
</html>
<?php 
    $conexion = mysqli_connect('localhost', 'root', '', 'usuarioing');
    if(isset($_POST['save'])){
        $name = $_POST['nombreADD'];
        $area = $_POST['areaADD'];
        $salary = $_POST['sueldoADD'];
        $conexion->query("INSERT INTO trabajadores (Nombre, Area, Sueldo) VALUES ('$name', '$area', '$salary')");
        echo "<script> window.location = '../menu_admin.php'; alert('Datos agregados correctamente');</script>";
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $conexion->query("DELETE FROM trabajadores WHERE id=$id");
        echo "<script> window.location = '../menu_admin.php'; alert('Datos elimnados correctamente');</script>";
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['nombreADD'];
        $area = $_POST['areaADD'];
        $salary = $_POST['sueldoADD'];
        $conexion->query("UPDATE trabajadores SET Nombre='$name', Area='$area', Sueldo='$salary' WHERE id=$id");
        echo "<script> alert('Datos editados'); window.location = '../Busqueda.php?nombre=$name';</script>";
    }
?>


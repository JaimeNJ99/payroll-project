<?php
    require("conexion.php");
    if(isset($_POST['save'])){
        $name = $_POST['nombreADD'];
        $area = $_POST['areaADD'];
        $salary = $_POST['sueldoADD'];
        $connection->query("INSERT INTO trabajadores (Nombre, Area, Sueldo) VALUES ('$name', '$area', '$salary')");
        echo "<script> window.location = '../menu_admin.php'; alert('Datos agregados correctamente');</script>";
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $connection->query("DELETE FROM trabajadores WHERE id=$id");
        echo "<script> window.location = '../menu_admin.php'; alert('Datos elimnados correctamente');</script>";
    }

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['nombreADD'];
        $area = $_POST['areaADD'];
        $salary = $_POST['sueldoADD'];
        $connection->query("UPDATE trabajadores SET Nombre='$name', Area='$area', Sueldo='$salary' WHERE id=$id");
        echo "<script> alert('Datos editados'); window.location = '../Busqueda.php?nombre=$name';</script>";
    }
?>


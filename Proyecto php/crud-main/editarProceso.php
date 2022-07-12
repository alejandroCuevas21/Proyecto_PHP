<?php
    print_r($_POST);
    if(!isset($_POST['matricula'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $matricula = $_POST['matricula'];
    $nombre = $_POST['txtNombre'];
    $paterno = $_POST['txtApePaterno'];
    $materno = $_POST['txtApeMaterno'];
    $telefono = $_POST['txtTelefono'];
    $email = $_POST['txtEmail'];

    $sentencia = $bd->prepare("UPDATE alumnos SET nombre = ?, apepaterno = ?, apematerno = ? , telefono = ?, email = ?   where matricula = ?;");
    $resultado = $sentencia->execute([$nombre, $paterno, $materno, $telefono, $email, $matricula]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
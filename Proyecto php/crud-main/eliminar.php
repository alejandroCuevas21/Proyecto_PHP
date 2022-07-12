<?php 
    if(!isset($_GET['matricula'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $matricula = $_GET['matricula'];

    $sentencia = $bd->prepare("DELETE FROM alumnos where matricula = ?;");
    $resultado = $sentencia->execute([$matricula]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>
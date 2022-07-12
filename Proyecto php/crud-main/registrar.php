<?php

     if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) ||  empty($_POST["txtPaterno"] || empty($_POST["txtMaterno"]) ||  empty($_POST["txtTelefono"]) || empty($_POST["txtEmail"])      )){
        header('Location: index.php?mensaje=falta');
        exit();
     }

     include_once 'model/conexion.php';
     $nombre = $_POST['txtNombre'];
     $paterno = $_POST['txtPaterno'];
     $Materno = $_POST['txtMaterno'];
     $Telefono = $_POST['txtTelefono'];
     $Email = $_POST['txtEmail'];
     $Estatus = 1;

    $sentencia = $bd->prepare("INSERT INTO Alumnos( Nombre,ApePaterno,ApeMaterno,Telefono,Email,Estatus)VALUES(?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$paterno,$Materno,$Telefono, $Email, $Estatus]);

    if ($resultado === TRUE){
        header('Location: index.php?mensaje=registrado');
    }else{
       header('Location: index.php?mensaje=error');
    }

?>
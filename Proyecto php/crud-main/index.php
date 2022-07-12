<?php include 'template/header.php' ?>

<?php 
     include_once "model/conexion.php";
     $sentencia = $bd -> query("select Matricula,Nombre, ApePaterno, ApeMaterno,Telefono,Email from Alumnos where estatus = 1");
     $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
        
        <?php include 'template/mensajes.php'?>
        
            <div class="card">
            <div class="card-header">
                Lista de alumnos
                </div>
                <div class="p-4">
                   <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ape. Paterno</th>
                            <th scope="col">Ape. Materno</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th> 
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           foreach($persona as $dato){

                           
                        ?>
                        <tr>
                            <td scope="row"><?php echo $dato->matricula; ?></td>
                            <td><?php echo $dato->nombre; ?></td>
                            <td><?php echo $dato->apepaterno; ?></td>
                            <td><?php echo $dato->apematerno; ?></td>
                            <td><?php echo $dato->telefono ?></td>
                            <td><?php echo $dato->email ?></td>
                            <td><a class="text-success" href="editar.php?matricula=<?php echo $dato->matricula; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?matricula=<?php echo $dato->matricula; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>

                        <?php

                           }
                        ?>

                    </tbody>
                   </table>
                   
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>

                    <div class="mb-3">
                       <label class="form-label">Paterno: </label>
                       <input type="text" class="form-control" name="txtPaterno" autofocus required>
                     </div>
                    <div class="mb-3">
                        <label class="form-label">Materno: </label>
                        <input type="text" class="form-control" name="txtMaterno" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number"class="form-control" name="txtTelefono" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email: </label>
                     <input type="text" class="form-control" name="txtEmail" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
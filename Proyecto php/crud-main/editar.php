<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['matricula'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $matricula = $_GET['matricula'];

    $sentencia = $bd->prepare("select Matricula, Nombre, ApePaterno, ApeMaterno, Telefono, Email,Estatus from Alumnos where Matricula = ?;");
    $sentencia->execute([$matricula]);
    $Alumnos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $Alumnos->nombre; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Paterno: </label>
                        <input type="text" class="form-control" name="txtApePaterno" required
                            value="<?php echo $Alumnos->apematerno; ?>">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Materno: </label>
                        <input type="text" class="form-control" name="txtApeMaterno" required
                             value="<?php echo $Alumnos->apepaterno; ?>">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtTelefono" required
                                value="<?php echo $Alumnos->telefono; ?>">
                    </div>              
                   
                    <div class="mb-3">
                        <label class="form-label">email: </label>
                        <input type="text" class="form-control" name="txtEmail" autofocus required
                        value="<?php echo $Alumnos->email; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="matricula" value="<?php echo $Alumnos->matricula; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
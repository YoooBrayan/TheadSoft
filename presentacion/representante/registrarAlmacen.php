<?php

include 'presentacion/representante/cabeceraRepresentante.php';

$error = -1;

if (isset($_POST['registrar'])) {

    $almacen = new Almacen("", $_POST['nombre']);
    if (!($almacen->validarAlmacen())) {
        $almacen->registrar();
        $error = 0;
    } else {
        $error = 1;
    }
}

?>
<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div id="mensaje" class='alert alert-danger' role='alert' hidden></div>
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registrar Almacen</div>
                <div class="card-body">
                    <?php
                    if ($error == 0) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            Almacen registrado exitosamente.
                        </div>
                    <?php } else if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El Almacen ya existe.
                        </div>
                    <?php }else{ ?>
                        
                    <?php } ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/representante/registrarAlmacen.php") ?> method="post">

                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                        </div>

                        <button id="importar" type="submit" name="registrar" class="btn btn-dark">Registrar</button>
                        <a class="btn btn-dark " href="index.php?pid=<?php echo base64_encode('presentacion/sesionAdministrador.php') ?>" role="button">Inicio</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>